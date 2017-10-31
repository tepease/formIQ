<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/forms', 'FormController@index');

Route::post('/forms', 'FormConstroller@store');

Route::get('/forms/{formId}', 'FormController@show');

Route::patch('/forms/{formId}', 'FormController@update');

Route::get('/forms/{formId}/questions', 'QuestionController@index');

Route::get('/forms/{formId}/questions/{questionId}', 'QuestionController@show');



Route::get('/users/{userId}/forms', 'Users/FormController@index');

Route::get('/users/{userId}/forms/{formId}', 'Users/FormController@show');

Route::get('/users/{userId}/forms/{formId}/sessions', 'SessionController@index');

Route::get('/users/{userId}/forms/{formId}/sessions/{sessionId}', 'SessionController@show');
