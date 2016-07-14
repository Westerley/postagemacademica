<?php

Route::group(['middleware' => 'web'], function() {

    Route::auth();

    Route::get('/', 'HomeController@index');

    Route::get('/profile', 'ProfileController@show');

    Route::get('/post', 'PostController@index');

    Route::get('/timeline', 'ProfileController@index');

    Route::get('/courses', 'CourseController@index');

});
