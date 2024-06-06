<?php
use Illuminate\Support\Facades\Route;
Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/','CategoryController@index')->name('index');
        Route::get('data','CategoryController@data')->name('data');
        Route::get('create','CategoryController@create')->name('create');
        Route::post('create','CategoryController@store');
        Route::get('edit/{category}','CategoryController@edit')->name('edit');
        Route::patch('update/{category}','CategoryController@update')->name('update');
        Route::delete('delete/{category}','CategoryController@delete')->name('delete');
    });
});


// Route::group(['as' => 'courses.'],function () {
//     Route::get('/khoa-hoc','Clients\CoursesController@index')->name('index');
// });