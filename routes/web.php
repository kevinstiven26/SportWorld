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
})->name('inicio');

Route::resource('providers', 'Provider\ProviderController');
Route::resource('customers', 'Customer\CustomerController');
Route::resource('customers.orders', 'Customer\CustomerOrderController')->middleware('auth.basic');
Route::resource('categories', 'Category\CategoryController');
Route::resource('products', 'Product\ProductController');
/* Route::resource('product_list', 'Product\ProductListController',['except'=>['index']]); */
Route::resource('product_list', 'Product\ProductListController');
Route::resource('field_types', 'FieldType\FieldTypeController');
Route::resource('field_products', 'FieldProduct\FieldProductController');
Route::resource('shoppingcarts', 'ShoppingCart\ShoppingCartController');
Route::resource('orders', 'Order\OrderController')->middleware('auth');
Route::post('shoppingcarts/update', 'ShoppingCart\ShoppingCartController@updateQuantity')->name('quantity');

Route::resource('category.field_product', 'Category\CategoryFieldProductController',['only'=>['index','create','store','destroy']]);
Route::resource('field_product.field_value', 'FieldProduct\FieldProductFieldValueController',['only'=>['index','create','store','destroy']]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
