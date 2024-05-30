<?php

use App\Models\Category;
use App\Models\Item;
use App\Models\Organization;
use App\Models\OrganizationUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

function sessioncartcount()
{

    $cartItems = session('cart', []);
   return $uniqueProductCount = count($cartItems);
}

if (!function_exists('getAuthCat')) {
    function getAuthCat() {

        // $organizationUser = OrganizationUser::where('user_id',Auth::id())->get()->pluck('category_id');
        $organizationUser = OrganizationUser::where('user_id',Auth::id())->get();
        $cat_id = $organizationUser->pluck('category_id');
        $organization_id =  $organizationUser->pluck('organization_id');
        $cat = Category::whereIn('id',$cat_id)->with('subcategories.products.Item')->get();
        $organization = Organization::whereIn('id',$organization_id)->get()->pluck('commission_rate');
        // dd($cat);





        // $categories = [];

        // if (Auth::check()) {
        //     $user = Auth::user();
        //     $organizationUser = $user->organizationUser;

        //     if ($organizationUser) {
        //         $commissionRate = $organizationUser->organization->commission_rate;
        //         $categories = Category::with(['subcategories.products.item' => function ($query) use ($commissionRate) {
        //             $query->select('items.*', DB::raw('(unit_price + (unit_price * ' . $commissionRate . ' / 100)) as final_price'));
        //         }])
        //         ->where('id', $organizationUser->category_id)
        //         ->get();
        //     }
        // } else {
        //     $categories = Category::with(['subcategories.products.item' => function ($query) {
        //         $query->select('items.*', 'unit_price as final_price');
        //     }])
        //     ->get();
        // }

        return $cat;
    }
}


// if (!function_exists('getFinalItemPrice')) {
//     function getFinalItemPrice() {
//         if (Auth::check()) {
//             $user = Auth::user();
//             $organizationUser = $user->organizationUser;

//             if ($organizationUser && isset($organizationUser->commission_rate)) {
//                 $commissionRate = $organizationUser->commission_rate;
//                 $finalPrice = $item->unit_price + $item->unit_price * ($commissionRate / 100);
//                 return $finalPrice;
//             }
//         }

//         return $item->unit_price; // Return original price if no commission applies
//     }
// }
