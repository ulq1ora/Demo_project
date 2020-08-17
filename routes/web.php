<?php

Route::get('/', 'addPastaController@allData')->name('home');


Route::get('/contact', 'addPastaController@allData')->name('contact');

Route::get('/pasta/{hash}', 'ContactController@getPasta')->name('detailed');
Route::post('/contact/submit', 'ContactController@submit')->name('contact-form');
Route::get('/contact/all', 'ContactController@allData')->name('contact-data');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
