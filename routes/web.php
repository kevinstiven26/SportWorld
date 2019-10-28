<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', function () {
    return view('index');
});

Route::resource('providers', 'Provider\ProviderController');
Route::resource('customers', 'Customer\CustomerController');
Route::resource('categories', 'Category\CategoryController');
Route::resource('products', 'Product\ProductController');
Route::resource('field_types', 'FieldType\FieldTypeController');
Route::resource('field_products', 'FieldProduct\FieldProductController'); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
