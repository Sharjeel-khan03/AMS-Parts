<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\AddToCart;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\ItemQuotes;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Organization;
use App\Models\OrganizationUser;
use App\Models\Role;
use App\Models\ShippingAddress;
use App\Models\User;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WebsiteController extends Controller
{
    //
    public function index()
    {
        // $getcategories = Category::with('getParentCategory')->limit(16)->get();
        $getcategories = Category::limit(16)->get();
        // return $getcategories;
        return view('website.index', get_defined_vars());
    }
    public function product_shop($slug)
    {

        $data = ProductService::getItem($slug);
        // return $data;
        // $forprice = getAuthCat();

        return view('website.product', get_defined_vars());
    }
    public function product_detail($slug)
    {
        $data = ProductService::getItemDetail($slug);
        if(Auth::check()){
        $itemcat =ItemCategory::where('item_id',$data->id)->first();
        $organizationUser = OrganizationUser::where('user_id',Auth::id())->first();
        $organization_id =  $organizationUser->pluck('organization_id');
        $organization = Organization::whereIn('id',$organization_id)->first();
        }
        // return $organization->commission_rate;
        return view('website.product-detail', get_defined_vars());
    }
    public function addto_cart()
    {
        $cartItems = session('cart', []);
        $uniqueProductCount = count($cartItems);

        return view('website.cart', get_defined_vars());
    }


    public function checkout()
    {
        $cartItems = session('cart', []);
        $uniqueProductCount = count($cartItems);
        return view('website.checkout', get_defined_vars());
    }
    // account login and registor function
    public function login_page()
    {
        return view('dashboard.account-login', get_defined_vars());
    }

    public function register_page()
    {
        // dd(get_defined_vars());
        $roles = Role::all();
        return view('dashboard.account-register', ['roles' => $roles]);
    }
    public function forgot_password()
    {
        return view('dashboard.account-password', get_defined_vars());
    }

    public function save_register_detail(Request $request)
    {
        $validated = $request->validate([

            'first_name' => 'required|max:35',
            'last_name' => 'required|max:35',
            // 'type' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users,email|max:100',
            // 'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()],
            'password' => ['required'],
            'address' => ['required'],
            'organization' => ['required'],
            'file' => ['required'],
            'confirm_password' => 'required|same:password',
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->otp = '';
        $user->password = Hash::make($request->password);
        $user->user_name = $request->first_name . ' ' . $request->last_name;
        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->slug = $request->first_name . '-' . $request->last_name;
        $user->role_id = $request->role_id;
        $user->address = $request->address;
        $user->organization = $request->organization;
        $user->status = 0;
        $user->file = config('app.url') . '/storage/' . Storage::disk('public')->put('documents', $request->file);
        $user->save();

        $notification = $request->session()->flash('error', 'please wait while admin approves your account');
        return redirect()->route('login')->with($notification);

        // Auth::login($user);

        // $notification = $request->session()->flash('register', 'Successfully Register in PcPartsSeller!');

        // return redirect()->route('user-dashboard')->with($notification);
    }

    public function userlogin(Request $request)
    {
        $validated = $request->validate([
            'username_email' => 'required|max:100',
            'password' => ['required'],
        ]);
        $credentials = $request->only('username_email', 'password');
        $credentials['status'] = 1;
        $credentials['role_id'] = 2;
        // $credentials['role_id'] = 2;

        // Check if the input is an email
        $isEmail = filter_var($credentials['username_email'], FILTER_VALIDATE_EMAIL);
        if ($isEmail) {
            $field = 'email';
        } else {
            $field = 'user_name';
        }
        // Attempt to authenticate using email or username
        if (Auth::attempt([$field => $credentials['username_email'], 'password' => $credentials['password'], 'status' => 1])) {
            Auth::user()->update(['last_login_at' => now()]);
            // Authentication passed
            if (Auth::user()->role_id == 0) {
                Auth::logout();
            }

            if ($request->session()->has('quote_data')) {
                $quoteData = $request->session()->pull('quote_data');
                $quoteData['user_id'] = Auth::id();
                $quoteData['status'] = 1;
                ItemQuotes::create($quoteData);
                return redirect()->route('user-dashboard')->with('success', 'Successfully Send Quote to Admin!');
            } else {
                $notification = $request->session()->flash('login', 'Successfully logged in!');
                return redirect()->route('user-dashboard')->with($notification);
            }
        } else {
            // Authentication failed
            if ($isEmail) {
                $user = User::where('email', $credentials['username_email'])->first();
            } else {
                $user = User::where('user_name', $credentials['username_email'])->first();
            }

            if ($user) {
                if ($user->status == 0) {
                    $notification = array('inactive' => 'Your account is not approved by the admin yet!');
                } else {
                    $notification = array('invalid' => 'Invalid credentials!');
                }
            } else {
                $notification = $request->session()->flash('notregister', 'You are not registered in PcPartsSeller!');
                // $notification =
                // array('notregistered' => 'You are not registered in FsDesign!');
            }

            return redirect()->route('login')->with($notification);
        }
    }






    // order save fucntion's
    public function addToCart(Request $request)
    {
        $itemId = $request->itemid;
        $cart = Session::get('cart', []);
        if (isset($cart[$itemId])) {
            $cart[$itemId]['quantity'] += 1;
        } else {
            $cart[$itemId] = [
                'item_id' => $itemId,
                'quantity' => 1,
            ];
        }
        Session::put('cart', $cart);
        $notification = $request->session()->flash('success', 'Item added to cart successfully.');
        return redirect()->back()->with($notification);
    }

    public function removeFromCart(Request $request)
    {
        $cart = Session::get('cart', []);

        $itemId = $request->itemid;
        if (isset($cart[$itemId])) {
            unset($cart[$itemId]);
            Session::put('cart', $cart);
        }

        $notification = $request->session()->flash('success', 'Item remove from cart successfully.');
        return redirect()->back()->with($notification);
    }


    public function place_order(Request $request)
    {
        // dd($request->all());
        if (Auth::check()) {
            $user = Auth::user();
            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'country' => $request->country,
                'address' => $request->address_name,
                'city' => $request->city_name,
                'state' => $request->state_name,
                'contact' => $request->contact_name,
                'zipcode' => $request->zip_code,
                'user_name' => $request->first_name . ' ' . $request->last_name,
                'name' => $request->first_name . ' ' . $request->last_name,
                'slug' => $request->first_name . '-' . $request->last_name,
            ]);
        } else {
            // If not logged in, create a new user
            $randomPassword = Str::random(8);
            $user = new User();
            $user->fill([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($randomPassword),
                'country' => $request->country,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'contact' => $request->contact,
                'zipcode' => $request->zipcode,
                'user_name' => $request->first_name . ' ' . $request->last_name,
                'name' => $request->first_name . ' ' . $request->last_name,
                'slug' => $request->first_name . '-' . $request->last_name,
                'role_id' => 2,
                'status' => 1,
                'otp' => ''
            ])->save();

            // Log in the newly created user
            Auth::login($user);
        }






        // Create order
        $order = new Order();
        $order->user_id = $user->id;
        $order->total = $request->total_amount;
        $order->order_notes	= $request->order_note;
        $order->status = 1;
        $order->save();

        foreach ($request->item_id as $key => $itemId) {
            // Retrieve corresponding quantity and total_cost values from the request array
            $quantity = $request->quantity[$key];
            $totalCost = $request->total_cost[$key];

            $orderline = new OrderLine();
            $orderline->order_id = $order->id;
            $orderline->item_id = $itemId;
            $orderline->quantity = $quantity;
            $orderline->total_cost = $totalCost;
            $orderline->save();
        }

        // Clear cart session
        Session::forget('cart');
            if ($request->has('Ship_to_a_different_address') && $request->Ship_to_a_different_address == 'on') {
                $shippingAddress = ShippingAddress::where('user_id', $user->id)->first();

                if ($shippingAddress) {
                    // Update existing shipping address
                    $shippingAddress->shipping_address = $request->address;
                    $shippingAddress->shipping_city = $request->city;
                    $shippingAddress->shipping_state = $request->state;
                    $shippingAddress->shipping_zipcode = $request->zipcode;
                    $shippingAddress->save();
                } else {
                    // Create new shipping address
                    $shipping_address = new ShippingAddress();
                    $shipping_address->user_id = $user->id;
                    $shipping_address->order_id = $order->id;
                    $shipping_address->shipping_address = $request->address;
                    $shipping_address->shipping_city = $request->city;
                    $shipping_address->shipping_state = $request->state;
                    $shipping_address->shipping_zipcode = $request->zipcode;
                    $shipping_address->save();
                }
            }
        if ($request->has('Ship_to_a_different_address') && $request->Ship_to_a_different_address == 'on') {
            $shippingAddress = ShippingAddress::where('user_id', $user->id)->first();

            if ($shippingAddress) {
                // Update existing shipping address
                $shippingAddress->shipping_address = $request->address;
                $shippingAddress->shipping_city = $request->city;
                $shippingAddress->shipping_state = $request->state;
                $shippingAddress->shipping_zipcode = $request->zipcode;
                $shippingAddress->save();
            } else {
                // Create new shipping address
                $shipping_address = new ShippingAddress();
                $shipping_address->user_id = $user->id;
                $shipping_address->order_id = $order->id;
                $shipping_address->shipping_address = $request->address;
                $shipping_address->shipping_city = $request->city;
                $shipping_address->shipping_state = $request->state;
                $shipping_address->shipping_zipcode = $request->zipcode;
                $shipping_address->save();
            }
        }

        // Clear cart session
        Session::forget('cart');

        $notification = $request->session()->flash('success', 'Oder Placed successfully.');
        return redirect()->route('user-dashboard')->with($notification);
    }

    public function store_qoute(Request $request)
    {

        if (!Auth::check()) {
            // User is not logged in, store the quote data in the session
            $request->session()->put('quote_data', $request->all());
            return redirect()->route('login')->with('error', 'Please login to Send Quote.');
        }

        $qoute = new ItemQuotes();
        $qoute->user_id = Auth()->id();
        $qoute->item_id = $request->item_id;
        $qoute->quantity = $request->quantity;
        $qoute->custome_price = $request->custome_price;
        $qoute->status = 1;
        $qoute->save();

        $notification = $request->session()->flash('success', 'Successfully Send Qoute to Admin!');
        return redirect()->route('user-dashboard')->with($notification);
    }

    public function updateCart(Request $request)
    {
        // Retrieve data from the request
        $cartId = $request->input('cart_id');
        $quantity = $request->input('quantity');

        // dd($quantity);
        // Update quantity in the session
        $cart = session('cart');
        $cart[$cartId]['quantity'] = $quantity;
        session(['cart' => $cart]);

        // Return response (you can return any data you need)
        return response()->json(['success' => true]);
    }


    // search filter
    public function searchItems(Request $request)
    {
        // dd($request->all());
        $query = Item::query();
        if ($request->filled('part_no_name')) {
            $searchTerm = $request->part_no_name;
            $query->where(function ($query) use ($searchTerm) {
                $query->where('part_no', 'like', '%' . $searchTerm . '%')
                      ->orWhere('name', 'like', '%' . $searchTerm . '%');
            });
        }
        if ($request->filled('part_no')) {
            $query->where('part_no', $request->part_no);
        }

        if ($request->filled('item_name')) {
            $query->where('name', 'like', '%' . $request->item_name . '%');
        }

        $dataproduct = $query->with('ItemImage')->get();

        // return $items;

        return view('website.product', get_defined_vars());

    }
}
