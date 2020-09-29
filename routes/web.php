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


// Category
Route::get('category', 'CategoryController@index');
Route::post('createCategory', 'CategoryController@addCategory');
Route::delete('category/{category}', 'CategoryController@deleteCategory');
Route::patch('updateCategory/{category}', 'CategoryController@updateCategory');


// Unit
Route::get('unit', 'UnitController@index');
Route::post('createUnit', 'UnitController@addUnit');


// Product
Route::get('product', 'ProductController@index');
Route::post('createProduct', 'ProductController@addProduct');
Route::post('{id}/updateProduct', 'ProductController@updateProduct');
Route::get('{id}/deleteProduct', 'ProductController@deleteProduct');
