<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contract', function () {
    echo "This is contract Page";
});
Route::get('/stuff', function () {
    echo "This is stuff Page";
});
