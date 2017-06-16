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
Auth::routes();

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

Route::get('Compare', ['as' => 'compare', 'uses' => 'CompareController@getOptionsPage']);
Route::post('Compare/Details', ['as' => 'compareDetails', 'uses' => 'CompareController@getDetails']);

Route::post('Search', ['as' => 'search', 'uses' => 'SearchController@searchProduct']);

//login required routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('/cart', 'CartController@index');
    Route::post('/cart', 'CartController@addToCart');
    Route::get('/order/details', 'OrderController@details');
    Route::post('/order/place', 'UserController@addInfo');
    Route::get('/order/payment', 'OrderController@payment');
});

//admin Routes
Route::group(['middleware' => 'App\Http\Middleware\CheckAdmin'], function()
{
    Route::get('/admin', 'admin\AdminController@index');

    //products
    Route::get('/admin/products', 'admin\ProductController@index');
    Route::post('/admin/products/delete', 'admin\ProductController@delete');
    Route::get('/admin/product/{id?}', 'admin\ProductController@showProduct');
    Route::post('/admin/product', 'FileController@upload');

    //users
    Route::get('/admin/users', 'admin\UserController@index');
    Route::get('/admin/users/{id}', 'admin\UserController@changeRights');
    Route::post('/admin/users/delete', 'admin\UserController@delete');

    //orders
    Route::get('/admin/orders', 'admin\OrderController@index');
    Route::post('/admin/orders/delete', 'admin\OrderController@delete');

    //categories
    Route::get('/admin/categories', 'admin\CategoryController@index');
    Route::post('/admin/categories/delete', 'admin\CategoryController@delete');
    Route::get('/admin/category/{id?}', 'admin\CategoryController@showCategory');
    Route::post('/admin/category', 'admin\CategoryController@createOrUpdate');

    //subcategories
    Route::get('/admin/subcategories', 'admin\SubcategoryController@index');
    Route::get('/admin/subcategories/delete/{id}', 'admin\SubcategoryController@delete');
    Route::post('/admin/subcategory', 'admin\SubcategoryController@createOrUpdate');
    Route::get('/admin/subcategory', 'admin\SubcategoryController@createOrUpdate');
    Route::get('/admin/subcategory/add/{id}', 'admin\SubcategoryController@showSubCategory');
});