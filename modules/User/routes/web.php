<?php
use Illuminate\Support\Facades\Route;
Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/','Admin\UserController@index')->name('index');
        Route::get('data','Admin\UserController@data')->name('data');
        Route::get('create','Admin\UserController@create')->name('create');
        Route::post('create','Admin\UserController@store');
        Route::get('edit/{user}','Admin\UserController@edit')->name('edit');
        Route::patch('update/{user}','Admin\UserController@update')->name('update');
        Route::delete('delete/{user}','Admin\UserController@delete')->name('delete');
    });
});


// Route::group(['as' => 'courses.'],function () {
//     Route::get('/khoa-hoc','Clients\CoursesController@index')->name('index');
// });