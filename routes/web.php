<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/categories', [App\Http\Controllers\Frontend\FrontendController::class, 'category']);
Route::get('/view-products/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'view_products']);
Route::get('/category/{cate_slug}/{pro_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'product_details']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('home');
Route::post('/add-to-cart','Frontend\CartController@index');
Route::get('/wishlist','Frontend\WishlistController@index');
Route::post('/wishlistadd','Frontend\WishlistController@addtowishlist');
Route::post('/delete-wishlist-item','Frontend\WishlistController@delete_wishlist_item');

Route::middleware(['auth'])->group(function(){
Route::get('/cart','Frontend\CartController@cartview');
Route::get('/wishlist','Frontend\WishlistController@index');
Route::post('/delete-cart-item','Frontend\CartController@delcartitem');
Route::post('/update-cart-qty','Frontend\CartController@update_cart_qty');
Route::get('/checkout', 'Frontend\CheckoutController@index');
Route::post('/place-order', 'Frontend\CheckoutController@place_order');
Route::get('/my-orders', 'Frontend\UserController@index');
Route::get('/my-orders/{id}', 'Frontend\UserController@view');
Route::get('/load-cart-data', 'Frontend\CartController@count');
Route::get('/load-orders-data', 'Frontend\CheckoutController@count_orders');
Route::get('/load-wishlist-data', 'Frontend\WishlistController@count_wishlist');
});

 Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', 'admin\FrontendController@index');
    Route::get('/category', 'admin\CategoryController@index');
    Route::get('/AddCategory', 'admin\CategoryController@addcategory');
    Route::post('/InsertCategory', 'admin\CategoryController@insertcategory');
    Route::get('/del-category/{id}', 'admin\CategoryController@delcategory');
    Route::get('/edit-category/{id}', 'admin\CategoryController@editcategory');
    Route::put('/update-category/{id}', 'admin\CategoryController@updatecategory');
    Route::get('/products', 'admin\ProductsController@products');
    Route::get('/addproducts', 'admin\ProductsController@addproduct');
    Route::post('/inset_product', 'admin\ProductsController@insetproduct');
    Route::get('/edit_product/{id}', 'admin\ProductsController@edit_product');
    Route::post('/update_product/{id}', 'admin\ProductsController@update_product');
    Route::get('/del_product/{id}', 'admin\ProductsController@del_product');
    Route::get('/orders', 'admin\OrderController@index');
    Route::get('/view/{id}', 'admin\OrderController@view_orders');
    Route::post('/update/{id}', 'admin\OrderController@update_order');

 });
