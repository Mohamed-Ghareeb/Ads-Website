<?php


Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->name('back.')->middleware('admin')->namespace('Backend')->group(function () {
    Route::get('/home', 'Home@index')->name('home');                                   // Routes Home For Dashboard
    
    Route::get('/users/all_trashed', 'Users@all_trashed')->name('all_trashed');
    Route::get('/users/restore/{id}', 'Users@restore')->name('users.restore');
    Route::delete('/users/delete/{id}', 'Users@delete')->name('users.delete');
    Route::post('/profile', 'Users@updateProfile')->name('profile.update');
    Route::resource('users', 'Users');                                                  // Routes Users
    Route::get('/categories/all_trashed', 'Categories@all_trashed')->name('categories_trashed');
    Route::get('/categories/restore/{id}', 'Categories@restore')->name('categories.restore');
    Route::delete('/categories/delete/{id}', 'Categories@delete')->name('categories.delete');
    Route::resource('categories', 'Categories');                                       // Routes Categories
    
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
