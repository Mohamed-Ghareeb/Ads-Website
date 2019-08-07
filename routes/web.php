<?php


Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->middleware('admin')->namespace('Backend')->group(function () {
    
    Route::get('/home', 'Home@index')->name('back.home');
    Route::resource('users', 'Users');

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
