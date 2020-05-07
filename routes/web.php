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

// Route::get('/', function () {
//     $agent = new Agent();
//     // dd($agent);
//     return view('welcome', compact('agent'));
// });

Route::get('/', 'FEBranchController@branches');
// Route::get('/branches', 'FEBranchController@branches');
Route::get('/products', 'FEProductsController@index');
Route::get('/specials', 'FEProductsController@specials');
Route::get('/cart', 'FEProductsController@cart');
Route::get('/customer', 'TransactionsController@customer');
Route::post('/transact', 'TransactionsController@start');
Route::get('/confirm', 'TransactionsController@confirm');

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/thankyou', 'PaymentController@handleGatewayCallback');

// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/account/dashboard', 'HomeController@index')->middleware('auth.basic');
Route::get('/account/branches', 'BranchController@index')->middleware('auth.basic');
Route::post('/account/branches/store', 'BranchController@store')->middleware('auth.basic');
Route::post('/account/branches/update', 'BranchController@update')->middleware('auth.basic');
Route::post('/account/branches/delete', 'BranchController@delete')->middleware('auth.basic');


Route::get('/account/products', 'ProductController@index')->middleware('auth.basic');
Route::post('/account/products/create', 'ProductController@create')->middleware('auth.basic');
Route::post('/account/products/delete', 'ProductController@delete')->middleware('auth.basic');
Route::post('/account/products/update', 'ProductController@update')->middleware('auth.basic');

