<?php

Route::get('/', 'HomeController@allData')->name('home');


Route::get('/contact', 'addContactController@allData')->name('contact');

Route::get('/pasta/{hash}', 'ContactController@getPasta')->name('detailed');
Route::post('/contact/submit', 'ContactController@submit')->name('contact-form');
Route::get('/contact/all', 'ContactController@allData')->name('contact-data');
