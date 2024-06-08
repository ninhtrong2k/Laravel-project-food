<?php
use Illuminate\Support\Facades\Route;
Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/','Admin\ProductController@index')->name('index');
        Route::get('data','Admin\ProductController@data')->name('data');
        Route::get('create','Admin\ProductController@create')->name('create');
        Route::post('create','Admin\ProductController@store');
        Route::get('edit/{product}','Admin\ProductController@edit')->name('edit');
        Route::patch('update/{teacher}','Admin\ProductController@update')->name('update');
        Route::delete('delete/{teacher}','Admin\ProductController@delete')->name('delete');
    });
});

Route::post('data','Admin\ProductController@dataApi')->name('data');
Route::post('dataName','Admin\ProductController@getNameApi')->name('data');

// Route::group(['as' => 'courses.'],function () {
//     Route::get('/khoa-hoc','Clients\CoursesController@index')->name('index');
// });