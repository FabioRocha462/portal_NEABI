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
Route::get('/', function () {
    return view('home/welcome');
});
Route::get('/login_admin', function () {
    return view('Admin/login');
});
Route::get('/create_login', function () {
    return view('Admin/create_login');
});