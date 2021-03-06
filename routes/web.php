<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'QuestionController@index');
Route::post('/', 'QuestionController@store');
Route::get('/questions/{id}', 'QuestionController@show')->where('id', '[0-9]+');

Route::post('/answers/{id}', 'AnswerController@store')->where('id', '[0-9]+');
