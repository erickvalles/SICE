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

Route::middleware('client')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('client')->get('student', ['uses' => 'PersonController@getAllAPI']);
Route::middleware('client')->post('student/search', ['uses'=>'PersonController@searchAPI']);
