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
Route::delete('unit/{unit}', 'UnitController@deleteUnit');
Route::patch('updateUnit/{unit}', 'UnitController@updateUnit');


// Category
Route::get('category', 'CategoryController@index');
Route::post('createCategory', 'CategoryController@addCategory');
Route::delete('category/{category}', 'CategoryController@deleteCategory');
Route::patch('updateCategory/{category}', 'CategoryController@updateCategory');


// Product
Route::get('product', 'ProductController@index');
Route::post('createProduct', 'ProductController@addProduct');
Route::post('{id}/updateProduct', 'ProductController@updateProduct');
Route::get('{id}/deleteProduct', 'ProductController@deleteProduct');
