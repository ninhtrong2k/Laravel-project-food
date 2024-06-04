<?php
use Illuminate\Support\Facades\Route;
Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/','Admin\ProductController@index')->name('index');
        Route::get('create','Admin\ProductController@create')->name('create');
    });
});


// Route::group(['as' => 'courses.'],function () {
//     Route::get('/khoa-hoc','Clients\CoursesController@index')->name('index');
// });