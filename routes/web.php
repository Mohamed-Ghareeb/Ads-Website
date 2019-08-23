<?php


Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->middleware('admin')->namespace('Backend')->group(function () {
    Route::get('/home', 'Home@index')->name('back.home');                     // Routes Home For Dashboard
    
    Route::get('/users/all_trashed', 'Users@all_trashed')->name('back.all_trashed');
    Route::get('/users/restore/{id}', 'Users@restore')->name('back.restore');
    Route::delete('/users/delete/{id}', 'Users@delete')->name('back.delete');
    Route::resource('users', 'Users');                                       // Routes Users
    
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
