<?php
use Illuminate\Support\Facades\Route;
Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/','Admin\dashboardController@index')->name('index');
    });
});


Route::group(['as' => 'courses.'],function () {
    Route::get('/khoa-hoc','Clients\CoursesController@index')->name('index');
});