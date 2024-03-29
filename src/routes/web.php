<?php

/*
|--------------------------------------------------------------------------
| Store Routes
|--------------------------------------------------------------------------
|
| Here is where you can register store routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
|--------------------------------------------------------------------------
| Store Group Routes
| 1. io
| 2. orders - customers
| 3. products - category
|--------------------------------------------------------------
*/
Route::group(['middleware' => 'web'], function ()
{

    /*
    |--------------------------------------------------------------------------
    | Products Routes
    |--------------------------------------------------------------------------
    */
    //http://localhost:8000/store/list
    Route::group(['prefix' => 'store'], function()
    {
        Route::get('list/', 'Store\Manager\Controllers\Products\ProductsController@all')->name('store.view');
        Route::get('/search', 'Store\Manager\Controllers\Products\ProductsController@search')->name('store.search');
        Route::get('/products/{id}/selected/{name}', 'Store\Manager\Controllers\Products\ProductsController@get')->name('store.product.details');
        
        /*--------------------------------------------------------------------------
        | Products Category Routes
        |--------------------------------------------------------------------------*/
        Route::group(['prefix' => 'category'], function()
        {
            Route::get('/', 'Store\Manager\Controllers\Products\CategoryController@all')->name('store.category.view');
            Route::get('/{id}/selected/{name}', 'Store\Manager\Controllers\Products\CategoryController@get')->name('store.category.products');
        });

        Route::group(['prefix' => 'orders'], function() {
            Route::get('/checkout/fulfilment', 'Store\Manager\Controllers\Customers\OrdersController@fulfilment')->name('checkout.fulfilment');
        });
    });

    /*--------------------------------------------------------------------------
    | Ajax Request Routes
    |--------------------------------------------------------------------------*/
    Route::group(['prefix' => 'ajax'], function()
    {
        Route::get('/get/product/quick-view/{id}', 'Store\Manager\Controllers\Products\ProductsController@_get')->name('store.get.product.quick.view');
    });

});