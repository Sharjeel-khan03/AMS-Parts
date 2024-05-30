<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    //     View::composer('*', function ($view) {
    //         if (Auth::check()) {
    //             $user = Auth::user();
    //             $organization = $user->organization()->first();
    //             $commissionRate = $organization ? $organization->commission_rate : 0;
    //             $categories = $user->categories()->get();
    //             // dd($categories);
    //             // Initialize $price_with_commission
    //             $price_with_commission = [];

    //             foreach ($categories as $category) {
    //                 foreach ($category->items as $item) {
    //                     $additionalAmount = ($item->unit_price * $commissionRate) / 100;
    //                     $price_with_commission[$item->id] = $item->unit_price + $additionalAmount;
    //                 }
    //             }
    //         } else {
    //             $categories = Category::with(['items'])->get();
    //             $price_with_commission = [];

    //             foreach ($categories as $category) {
    //                 foreach ($category->items as $item) {
    //                     $price_with_commission[$item->id] = $item->unit_price;
    //                 }
    //             }
    //         }

    //         $view->with('getcategories', $categories);
    //         $view->with('priceWithCommission', $price_with_commission);
    //     });
    }
}
