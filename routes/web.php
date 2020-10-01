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
    return view('index');
});



// Unit
Route::get('unit', 'UnitController@index');
Route::post('addUnit', 'UnitController@addUnit');
Route::post('{id}/updateUnit', 'UnitController@updateUnit');
Route::get('{id}/deleteUnit', 'UnitController@deleteUnit');


// Category
Route::get('category', 'CategoryController@index');
Route::post('addCategory', 'CategoryController@addCategory');
Route::post('{id}/updateCategory', 'CategoryController@updateCategory');
Route::get('{id}/deleteCategory', 'CategoryController@deleteCategory');


// Product
Route::get('product', 'ProductController@index');
Route::post('addProduct', 'ProductController@addProduct');
Route::post('{id}/updateProduct', 'ProductController@updateProduct');
Route::get('{id}/deleteProduct', 'ProductController@deleteProduct');

// Order
Route::get('order', 'OrderController@index');
