<?php
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', 'Admin\ProductController@index')->name('index');
        Route::get('data', 'Admin\ProductController@data')->name('data');
        Route::get('create', 'Admin\ProductController@create')->name('create');
        Route::post('create', 'Admin\ProductController@store');
        Route::get('edit/{product}', 'Admin\ProductController@edit')->name('edit');
        Route::patch('update/{teacher}', 'Admin\ProductController@update')->name('update');
        Route::delete('delete/{teacher}', 'Admin\ProductController@delete')->name('delete');
    });
});

// API interface interaction
Route::prefix('data')->name('data.')->group(function () {
    Route::prefix('products')->name('products.')->group(function () {
        Route::post('name', 'Clients\ProductController@findName');
        Route::post('list-cart', 'Clients\ProductController@listCart');
        Route::post('list-products', 'Clients\ProductController@listProducts');
        Route::post('products', 'Clients\ProductController@listProductsPage');
    });
});


Route::group(['as' => 'products.'],function () {
    Route::get('/shop','Clients\ProductController@index')->name('shop');
    Route::get('/shop-detail/{id}/{slug}','Clients\ProductController@detail')->name('detail');
    Route::post('/comment/{id}','Clients\ProductController@comment')->name('comment');
    // Cart
    Route::get('/cart','Clients\CartController@index')->name('cart');
});