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

Route::get('category/{id}', ['uses' =>  'CategoryController@getCategoryPage']);
Route::get('subcategory/{id}', ['uses' =>  'SubcategoryController@getCategoryPage']);

Route::get('about', array('as' => 'about', function () {
    return view('about');
}));

Auth::routes();
