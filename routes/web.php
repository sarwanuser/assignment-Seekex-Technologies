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

// Bucket 
Route::get('/bucket', 'BucketController@index');
Route::post('/bucket/store', 'BucketController@store');


// Ball 
Route::get('/ball', 'BallController@index');
Route::post('/ball/store', 'BallController@store');

// Bucket Suggestion
Route::get('/bucket-suggestion', 'BucketSuggestion@index');
Route::post('/bucket-suggestion/calculate', 'BucketSuggestion@calculate');

// Bucket Suggestion
Route::get('/', 'BucketSuggestion@index');