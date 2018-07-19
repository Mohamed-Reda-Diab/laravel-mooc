<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});

Route::get('about/profile/{me}', function ($me) {
    return $me.' is my name';
});



Route::get('courses', function () {
    return \App\Models\users_groups::all();
});