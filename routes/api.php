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

Route::get('/projects', 'ApiController@projects');
Route::get('/projects/{id}', 'ApiController@project');
Route::get('/technologies', 'ApiController@technologies');
Route::get('/technologies/{categ}', 'ApiController@technologieByCateg');
Route::get('/categories', 'ApiController@categories');
