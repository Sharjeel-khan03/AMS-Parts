<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\ItemQuotes;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Organization;
use App\Models\OrganizationUser;
use App\Models\User;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

class UserDashboardController extends Controller
{
    // Account Function's
    public function client_dashboard()
    {
        return view('dashboard.account-dashboard', get_defined_vars());
    }

    public function client_profile_edit()
    {
        return view('dashboard.account-edit-address', get_defined_vars());
    }
    public function client_quotes()
    {
        $data = ItemQuotes::with(['user', 'item'])->where('user_id', Auth()->id())->get();
        // return $data;

            // for get amount commission
            $itemIds = [];
            foreach ($data as $order) {
                foreach ($order->item as $orderLine) {
                    $itemIds[] = $orderLine->item_id;
                }
            }
            $itemcat =ItemCategory::where('item_id',$itemIds)->first();
            $organizationUser = OrganizationUser::where('user_id',Auth::id())->first();
            $organization_id =  $organizationUser->pluck('organization_id');
            $organization = Organization::whereIn('id',$organization_id)->first();
            // return $organization;
            // end

        return view('dashboard.account-quotes', get_defined_vars());
    }

    public function client_quote_details($id)
    {
        $data = ItemQuotes::with(['user', 'itemEdit'])->where('id', $id)->first();

        return view('dashboard.account-quote-details', get_defined_vars());
    }
    public function order_list()
    {
        $data = Order::with(['orderLineFront.itemProductFront'])->where('user_id', Auth()->id())->latest()->get();


        // for get amount commission
        $itemIds = [];
            foreach ($data as $order) {
                foreach ($order->orderLineFront as $orderLine) {
                    $itemIds[] = $orderLine->item_id;
                }
            }
            $itemcat =ItemCategory::where('item_id',$itemIds)->first();
            $organizationUser = OrganizationUser::where('user_id',Auth::id())->first();
            $organization_id =  $organizationUser->pluck('organization_id');
            $organization = Organization::whereIn('id',$organization_id)->first();
            // return $organization;
            // end
            
        return view('dashboard.account-orders', get_defined_vars());
    }

    public function order_list_details($id)
    {
        $data = Order::with(['shippingAddress', 'orderLineFront.itemProductFront','orderLineFront.itemQuote'])->where('id', $id)->first();
        return view('dashboard.account-order-details', get_defined_vars());
    }

    public function order_invoice()
    {
        $data = Order::with(['orderLineFront.itemProductFront'])->where('user_id', Auth()->id())->get();

        return view('dashboard.account-invoice', get_defined_vars());
    }
    public function order_invoice_details($id)
    {
        $data = Order::with(['shippingAddress', 'orderLineFront.itemProductFront'])->where('id', $id)->first();
        return view('dashboard.account-invoice-details', get_defined_vars());
    }
    public function showInvoicePDF()
    {
        $data = 'invoce';
        $pdf = Pdf::loadView('dashboard.account-invoice-generate-pdf', get_defined_vars());
        return $pdf->stream('invoice.pdf');
    }

    public function userlogout()
    {

        $user = Auth::user();
        Cache::forget('user-is-online-' . $user->id);

        Session::flush();
        Auth::logout();
        $notification = array('message' => 'Logout Successfully ! ', 'alert-type' => 'success');
        return redirect()->route('home')->with($notification);
    }

    public function handleStatusUpdate(Request $request)
    {
        $data = ItemQuotes::find($request->id);
        $data->status = $request->status;
        $data->save();
        if($request->status  == 2){
            $item = Item::where(['id' => $data->item_id])->first();
           $order = Order::create([
                "user_id" => $data->user_id,
                "total" => $data->company_offer * $data->quantity ,
                "status" => 1,
            ]);
            OrderLine::create([
                "order_id" => $order->id,
                "quote_id" => $data->id,
                "item_id" => $item->id,
                "quantity" => $data->quantity,
                "total_cost" =>  $data->company_offer * $data->quantity ,
            ]);
        }

        if($request->status  == 2){
            $notification = array('success' => 'Status Update Successfully and Qoute Convert into Order', 'alert-type' => 'success');
        }
        else{
            $notification = array('success' => 'Status Update Successfully', 'alert-type' => 'success');

        }
        return redirect()->route('user-quotes')->with($notification);

    }

    public function profileUpdate(Request $request)
    {

        $data = User::find($request->user_id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->country = $request->country;
        $data->address = $request->address;
        $data->city = $request->city;
        $data->state = $request->state;
        $data->zipcode = $request->zipcode;
        $data->contact = $request->contact;
        $data->show_password = $request->password;
        $data->show_password = Hash::make($request->password);
        $data->save();
        $notification = array('success' => 'Profile Update Successfully', 'alert-type' => 'success');
        return redirect()->route('user-profile-edit')->with($notification);
    }


    // serach filter order/quote
    public function serachOrder(Request $request)
    {
        // dd(Auth()->id());
        $query = Order::query();
        if ($request->filled('search')) {
            $query->where('id', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status') && $request->status != 0) {
            $query->where('status', $request->status);
        }

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
        $datasearch = $query->where('user_id',Auth()->id())->get();
        return view('dashboard.account-orders', ['datasearch' => $datasearch]);
    }

    public function serachQuote(Request $request)
    {

        $query = ItemQuotes::query();
        if ($request->filled('search')) {
            $query->where('id', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status') && $request->status !== 'none') {
            $query->where('status', $request->status);
        }

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
        $datasearch = $query->where('user_id',Auth()->id())->get();
        return view('dashboard.account-quotes', ['datasearch' => $datasearch]);

    }
}
