<?php

// user management

Route::get('/users', 'UserController@create');

Route::post('/users', 'UserController@store');

Route::get('/users/{user}', 'UserController@show');

Route::patch('/users/{user}', 'UserController@update');

// form management

Route::get('/forms', 'FormController@create');

Route::post('/forms', 'FormController@store');

Route::get('/forms/{form}', 'FormController@show');

Route::patch('/forms/{form}', 'FormController@update');

Route::delete('/forms/{form}', 'FormController@delete');

Route::get('/questions', 'QuestionController@create');

Route::get('/questions/schema', 'QuestionController@schema');

Route::get('/forms/{form}/questions', 'QuestionController@index');

Route::post('/forms/{form}/questions', 'QuestionController@store');

Route::get('/forms/{form}/questions/{question}', 'QuestionController@show');

Route::patch('/forms/{form}/questions/{question}', 'QuestionController@update');

// interaction reporting

Route::get('/users/{user}/forms', 'Users/FormController@index');

Route::get('/users/{user}/forms/{form}', 'Users/QuestionController@index');

Route::get('/users/{user}/forms/{form}/sessions', 'SessionController@index');

Route::get('/users/{user}/forms/{form}/sessions/{sessionId}', 'SessionController@show');

Route::get('/users/{user}/forms/{form}/report/{type}', 'Users/FormController@report');

Route::get('/users/{user}/forms/{form}/answers', 'AnswerController@index');

Route::get('/users/{user}/forms/{form}/answers/{type}', 'AnswerController@show');
