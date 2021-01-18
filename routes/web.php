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
//     return view('index.blade');
// });
//frontend

Route::get('frontendmaster','FrontendController@frontendmaster')->name('frontendmaster');
Route::get('/','FrontendController@index')->name('index');
Route::get('shoppingcart','FrontendController@shoppingcart')->name('shoppingcart');
Route::get('subcategory','FrontendController@subcategory')->name('subcategory');
Route::get('orderhistory','FrontendController@orderhistory')->name('orderhistory');
Route::get('brand/{id}','FrontendController@brand')->name('brand');

Route::get('itemdetail','ItemController@detail')->name('itemdetail');
//backend
Route::middleware('role:admin')->group(function () {
Route::get('dashboard','BackendController@dashboard')->name('dashboard');
Route::resource('categories','CategoryController');
Route::resource('brands','BrandController');
Route::resource('subcategories','SubcategoryController');
Route::resource('items','ItemController');

 });
Route::resource('orders','OrderController');

//auth
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
