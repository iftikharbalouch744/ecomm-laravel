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
    Route::get('/AddCategory', 'admin\CategoryController@add');
    Route::post('/InsertCategory', 'admin\CategoryController@insert');
    Route::get('/del-prod/{id}', 'admin\CategoryController@delproduct');
 });
