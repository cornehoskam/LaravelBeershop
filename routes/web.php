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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

//Authentication Routes
Route::get('/logout', 'Auth\LoginController@logout');
Auth::routes();

//admin Routes
Route::group(['middleware' => 'App\Http\Middleware\CheckAdmin'], function()
{
    Route::get('/admin', 'Admin\AdminController@index');
    Route::get('/admin/products', 'Admin\ProductController@index');

});