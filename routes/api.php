<?php

// user management

Route::post('/users', 'UserController@store');

Route::get('/users/create', 'UserController@create');

Route::get('/users/{user}', 'UserController@show');

Route::patch('/users/{user}', 'UserController@update');

// form management

Route::post('/forms', 'FormController@store');

Route::get('/forms/{form}', 'FormController@show');

Route::get('/forms/create', 'FormController@create');

Route::patch('/forms/{form}', 'FormController@update');

Route::delete('/forms/{form}', 'FormController@delete');

Route::get('/questions/create', 'QuestionController@create');

Route::get('/forms/{form}/questions', 'QuestionController@index');

Route::post('/forms/{form}/questions', 'QuestionController@store');

Route::get('/forms/{form}/questions/{question}', 'QuestionController@show');

Route::patch('/forms/{form}/questions/{question}', 'QuestionController@update');

// interaction reporting

Route::get('/users/{user}/forms', 'Users/FormController@index');

Route::get('/users/{user}/forms/{form}', 'Users/FormController@show');

Route::get('/users/{user}/forms/{form}/sessions', 'SessionController@index');

Route::get('/users/{user}/forms/{form}/sessions/{sessionId}', 'SessionController@show');

Route::get('/users/{user}/forms/{form}/report/{type}', 'Users/FormController@report');

Route::get('/users/{user}/forms/{form}/answers', 'AnswerController@index');

Route::get('/users/{user}/forms/{form}/answers/{type}', 'AnswerController@show');
