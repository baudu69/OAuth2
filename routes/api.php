<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:api'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test', function () {
    return ['ok'];
})->middleware('auth:api');

Route::get('sujets', 'ForumController@getLesSujets')->middleware(['auth:api', 'scope:forum']);

Route::post('addSujet', 'ForumController@addSujet')->middleware(['auth:api', 'scope:forum']);

Route::get('sujets/{id}', 'ForumController@getLesMessages')->middleware(['auth:api', 'scope:forum']);

Route::post('sujets', 'ForumController@addMessage')->middleware(['auth:api', 'scope:forum']);
