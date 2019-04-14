<?php

use Illuminate\Http\Request;

Route::get('students', 'Api\\StudentController@index');
Route::post('students', 'ArticleController@store');
Route::get('students/{student}', 'Api\\StudentController@show');
Route::put('students/{student}', 'ArticleController@update');
Route::delete('students/{student}', 'ArticleController@delete');

Route::get('employess', 'Api\\HrmanagementController@index');