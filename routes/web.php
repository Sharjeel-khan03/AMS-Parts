
<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\OderController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PurchaseOrderController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UnapproveUserController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\WareHouseController;
use App\Http\Controllers\Website\UserDashboardController;
use App\Http\Controllers\Website\WebsiteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('down', function () {
    Session::forget('cart');

    // Or, clear all session data
    // session()->flush();

    // Return a response or redirect
    return 'Session data cleared.';
});

// Admin side routes
Route::get('admin', [AdminController::class, 'admin_login'])->name('admin.login');
Route::post('admin-auth', [AdminController::class, 'admin_auth'])->name('admin.auth');

Route::group(['middleware' => ['preventBackHistory', 'admin_middleware'], 'prefix' => 'admin'], function () {
    // admin dashbaord and logout route
    Route::get('dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');
    Route::post("/admin/logout", [AdminController::class, 'admin_logout'])->name('admin_logout');
    // end

	Route::resource('users', UserController::class);
	Route::resource('unapprove-users', UnapproveUserController::class);
	Route::resource('categories', CategoryController::class);
	Route::resource('sub-categories', SubCategoryController::class);
	Route::resource('currency', CurrencyController::class);
	Route::resource('organizations', OrganizationController::class);
	Route::resource('vendors', VendorController::class);
	Route::resource('user-roles', RoleController::class);
	Route::resource('purchase-order', PurchaseOrderController::class);
	Route::resource('item', ProductController::class);
	Route::resource('quote', QuoteController::class);
	Route::resource('orders', OderController::class);
	Route::resource('inventories', InventoryController::class);
	Route::resource('warehouse', WareHouseController::class);

	Route::get('edit_users_list/{id}', [OrganizationController::class, "editUsersList"])->name("organizations.edit_users_list");
	Route::get('edit_categories_list/{id}', [OrganizationController::class, "editCategoriesList"])->name("organizations.edit_categories_list");
	Route::put('update_users_list/{id}', [OrganizationController::class, "updateUsersList"])->name("organizations.update_users_list");
	Route::put('update_categories_list/{id}', [OrganizationController::class, "updateCategoriesList"])->name("organizations.update_categories_list");

    Route::post('purchase-order-receive', [PurchaseOrderController::class, 'purchaseOrderReceive'])->name('purchase-order.receive');
    Route::get('/getSubcategories/{category_id}', [ProductController::class, 'getSubcategories'])->name('getSubcategories');
    Route::get('/getSubcategories/{category_id}', [ProductController::class, 'getSubcategories'])->name('getSubcategories');
    Route::get('all-orders', [OderController::class, 'allOrder'])->name('all-orders');
    Route::get('all-quotes', [QuoteController::class, 'allQuote'])->name('all-quotes');

    Route::post('file-upload', [InventoryController::class, 'fileUpload'])->name('file-upload');
    Route::get('all-invoice', [OderController::class, 'allInvoice'])->name('all-invoices');
    Route::get('show-invoice/{id}', [OderController::class, 'ShowInvoice'])->name('show-invoice');




    Route::post('change-status', [OderController::class, 'changeStatus'])->name('changeStatus');
});








// front routs old
// website routes
Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('product/{slug}', [WebsiteController::class, 'product_shop'])->name('product-shop');
Route::get('product-detail/{slug}', [WebsiteController::class, 'product_detail'])->name('product-detail');
Route::get('view-cart', [WebsiteController::class, 'addto_cart'])->name('addto-cart');
Route::get('checkout', [WebsiteController::class, 'checkout'])->name('checkout');

Route::post('add-to-cart', [WebsiteController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove', [WebsiteController::class, 'removeFromCart'])->name('cart.remove');
Route::post('qoute', [WebsiteController::class, 'store_qoute'])->name('store.qoute');
Route::post('Place-Order', [WebsiteController::class, 'place_order'])->name('store.order');

Route::post('/update-cart', [WebsiteController::class, 'updateCart'])->name('update-cart');

// search
Route::get('/search/results', [WebsiteController::class, 'searchItems'])->name('search.items');

// account login and other related route
Route::middleware(['user_middleware'])->group(function () {
    Route::get('user-dashboard', [UserDashboardController::class, 'client_dashboard'])->name('user-dashboard');
    Route::get('user-profile-edit', [UserDashboardController::class, 'client_profile_edit'])->name('user-profile-edit');
    Route::get('user-order-list', [UserDashboardController::class, 'order_list'])->name('user-orderlist');
    Route::get('user-order-details/{id}', [UserDashboardController::class, 'order_list_details'])->name('user-order-details');
    Route::get('user-quotes', [UserDashboardController::class, 'client_quotes'])->name('user-quotes');
    Route::get('user-quote-details/{id}', [UserDashboardController::class, 'client_quote_details'])->name('user-quote-details');
    Route::get('user-order-invoice', [UserDashboardController::class, 'order_invoice'])->name('user-order-invoice');
    Route::get('user-order-invoice-details/{id}', [UserDashboardController::class, 'order_invoice_details'])->name('user-order-invoice-details');
    Route::get('/invoice', [UserDashboardController::class, 'showInvoicePDF'])->name('show.invoice.pdf');
    Route::get('user-logout', [UserDashboardController::class, 'userlogout'])->name('user-logout');
    Route::post('status_update', [UserDashboardController::class, 'handleStatusUpdate'])->name('status_update');
    Route::get('orders-search', [UserDashboardController::class, 'serachOrder'])->name('serach-order');
    Route::get('quotes-search', [UserDashboardController::class, 'serachQuote'])->name('serach-quote');


    // profile update
    Route::post('profile-update', [UserDashboardController::class, 'profileUpdate'])->name('update.profile');
});
// login and registor route
Route::get('login', [WebsiteController::class, 'login_page'])->name('login');
Route::get('register', [WebsiteController::class, 'register_page'])->name('register');
Route::get('forgot-password', [WebsiteController::class, 'forgot_password'])->name('forgot-password');
Route::post('save-login', [WebsiteController::class, 'save_register_detail'])->name('register.store');
Route::post('user-login', [WebsiteController::class, 'userlogin'])->name('user.login');
