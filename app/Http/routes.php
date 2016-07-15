<?php

Route::group(['middleware' => 'web'], function() {

    Route::auth();

    Route::get('/', 'HomeController@index');

    Route::get('/timeline', 'PostController@index');

    Route::get('/profile/edit/{id}', 'ProfileController@edit');

    Route::post('/profile/edit/{id}', 'ProfileController@update');

    Route::get('/profile/password/{id}', 'ProfileController@show');

    Route::get('/post', 'PostController@create');

    Route::post('/post', 'PostController@store');

    Route::get('/courses', 'CourseController@index');

});
