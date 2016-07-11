<?php

Route::group(['middleware' => 'web'], function() {

    Route::auth();

    Route::get('/', 'HomeController@index');

    Route::get('/profile', 'ProfileController@index');

});
