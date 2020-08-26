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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', "TaskController@index");
Route::post("/task", "TaskController@store");
Route::post("/{id}/update", "TaskController@update");
Route::post("/{id}/delete", "TaskController@destroy");
Route::get("/{id}/complete", "TaskController@complete");
Route::get("/{id}/uncomplete", "TaskController@uncomplete");
Route::get("/{id}/delete", "TaskController@destroy");
Route::get("/{id}/edit", "TaskController@edit");