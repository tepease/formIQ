<?php

// user management

Route::post('/users', 'UserController@store');

Route::get('/users/{userId}', 'UserController@show');

Route::patch('/users/{userId}', 'UserController@update');

// form management

Route::post('/forms', 'FormConstroller@store');

Route::get('/forms/{formId}', 'FormController@show');

Route::patch('/forms/{formId}', 'FormController@update');

Route::get('/forms/{formId}/questions', 'QuestionController@index');

Route::post('/forms/{formId}/questions', 'QuestionController@store');

Route::get('/forms/{formId}/questions/{questionId}', 'QuestionController@show');

Route::patch('/forms/{formId}/questions/{questionId}', 'QuestionController@update');

// interaction reporting

Route::get('/users/{userId}/forms', 'Users/FormController@index');

Route::get('/users/{userId}/forms/{formId}', 'Users/FormController@show');

Route::get('/users/{userId}/forms/{formId}/sessions', 'SessionController@index');

Route::get('/users/{userId}/forms/{formId}/sessions/{sessionId}', 'SessionController@show');

Route::get('/users/{userId}/forms/{formId}/report/{type}', 'Users/FormController@report');

Route::get('/users/{userId}/forms/{formId}/answers', 'AnswerController@index');

Route::get('/users/{userId}/forms/{formId}/answers/{type}', 'AnswerController@show');
