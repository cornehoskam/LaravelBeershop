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
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);


//Authentication Routes
Route::get('/logout', 'Auth\LoginController@logout');

//Category Routes
Route::get('Category/{catname}', ['uses' =>  'CategoryController@getCategoryPage']);
Route::get('Category/{catname}/{subcatname}', ['uses' =>  'SubcategoryController@getCategoryPage']);

//Product Routes
Route::get('Product/{productname}', ['uses' =>  'ProductController@getProductPage']);

//About Routes
Route::get('about', array('as' => 'about', function () {
    return view('about');
}));


Auth::routes();


//admin Routes
Route::group(['middleware' => 'App\Http\Middleware\CheckAdmin'], function()
{
    Route::get('/admin', 'Admin\AdminController@index');

    //products
    Route::get('/admin/products', 'Admin\ProductController@index');
    Route::post('/admin/products/delete', 'Admin\ProductController@delete');
    Route::get('/admin/product/{id?}', 'Admin\ProductController@showProduct');
    Route::post('/admin/product', 'FileController@upload');

    //categories
    Route::get('/admin/categories', 'Admin\CategoryController@index');
    Route::post('/admin/categories/delete', 'Admin\CategoryController@delete');
    Route::get('/admin/category/{id?}', 'Admin\CategoryController@showCategory');
    Route::post('/admin/category', 'Admin\CategoryController@createOrUpdate');

    //subcategories
    Route::get('/admin/subcategories', 'Admin\SubcategoryController@index');
    Route::get('/admin/subcategories/delete/{id}', 'Admin\SubcategoryController@delete');
    Route::post('/admin/subcategory', 'Admin\SubcategoryController@createOrUpdate');
    Route::get('/admin/subcategory', 'Admin\SubcategoryController@createOrUpdate');
    Route::get('/admin/subcategory/add/{id}', 'Admin\SubcategoryController@showSubCategory');

});