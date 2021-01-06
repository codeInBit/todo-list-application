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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('tasks', 'API\TaskController');

Route::post('tasks/{task}/items', 'API\ItemController@store');
Route::put('tasks/{task}/items/{item}', 'API\ItemController@update');
Route::delete('tasks/{task}/items/{item}', 'API\ItemController@destroy');
