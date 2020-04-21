<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'UrlsController@create')->name('home');
Route::get('home', 'UrlsController@create');
Route::post('/', 'UrlsController@store');
Route::get('my-urls', 'UrlsController@myUrls');
Route::get('login', 'SessionsController@create');
Route::post('login', 'SessionsController@store');
Route::get('logout', 'SessionsController@destroy');
Route::get('register', 'RegistrationController@create');
Route::post('register', 'RegistrationController@store');
Route::get('{short}', 'UrlsController@show');
Route::get('delete/{url}', 'UrlsController@destroy');