<?php

use Illuminate\Support\Facades\Route;

Route::get('/cars', function () {
    return view('cars');
});
Route::get('/reviews', function () {
    return view('review');
});
Route::get('/tour', function () {
    return view('tour');
});
Route::get('/signup', function () {
    return view('signup');
});
Route::get('/login', function () {
    return view('Login');
});
Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('About');
});
