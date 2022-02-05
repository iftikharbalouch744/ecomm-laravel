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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
 });
