<?php

Route::get('/', 'addPastaController@allData')->name('home');
Route::post('/search', 'SearchController@search')->name('search');

Route::get('/contact', 'addPastaController@allData')->name('contact');

Route::get('/pasta/{hash}', 'PastaController@getPasta')->name('detailed');
Route::post('/contact/submit', 'PastaController@submit')->name('contact-form');
Route::get('/contact/all', 'PastaController@allData')->name('contact-data');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
