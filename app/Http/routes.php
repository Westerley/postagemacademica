<?php

Route::group(['middleware' => 'web'], function() {

    Route::auth();

    Route::get('/', 'HomeController@index');

    Route::get('/timeline', 'PostController@index');

    Route::get('/profile/edit/{id}', 'ProfileController@edit');

    Route::post('/profile/edit/{id}', 'ProfileController@update');

    Route::post('/profile/update-image', 'ProfileController@updateImage');

    Route::post('/profile/update-cape', 'ProfileController@updateCape');

    Route::get('/profile/password/{id}', 'ProfileController@newPassword');

    Route::post('/profile/password/{id}', 'ProfileController@updatePassword');

    Route::get('/post', 'PostController@create');

    Route::post('/post', 'PostController@store');

    Route::get('/courses', 'CourseController@index');

});
