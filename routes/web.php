<?php

use App\Http\Livewire\Admin\AdminCatagoryComponent;
use App\Http\Livewire\Admin\AdminAddCatagoryComponent;
use App\Http\Livewire\HomeCompnent;
use App\Http\Livewire\ShopeComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CatagoryComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditCatagoryComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditTshirt;
use App\Http\Livewire\Admin\AdminHomeCatagoryComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ThankyouComponent;
use Illuminate\Support\Facades\Route;

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

Route::get('/welcom', function () {
    return view('welcome');
});
Route::get('/',HomeCompnent::class);
Route::get('/shop',ShopeComponent::class);
Route::get('/cart',CartComponent::class)->name('product.cart');
Route::get('/checkout',CheckoutComponent::class)->name('checkout');
Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');
Route::get('/product-catagory/{catagory_slug}',CatagoryComponent::class)->name('product.catagory');
Route::get('/search',SearchComponent::class)->name('product.search');
Route::get('/wishlist',WishlistComponent::class)->name('product.wishlist');
Route::get('/thankyou-page',ThankyouComponent::class)->name('thankyou');
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
// for user
Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
});
// for admin
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/catagories',AdminCatagoryComponent::class)->name('admin.catagories');
    Route::get('/admin/catagories/add',AdminAddCatagoryComponent::class)->name('admin.addcatagories');
    Route::get('/admin/caragory/edit/{catagory_slug}',AdminEditCatagoryComponent::class)->name('admin.editcatagory');
    Route::get('/admin/products',AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add',AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.editproduct');
    Route::get('/admin/slider',AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/slider/add',AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slider_id}',AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');
    Route::get('/admin/home-catagory',AdminHomeCatagoryComponent::class)->name('admin.homecatagory');

    Route::get('/admin/sale',AdminSaleComponent::class)->name('admin.sale');
    Route::get('/admin/edit_tshirt',AdminEditTshirt::class)->name('admin.edit_t-shirt');

});