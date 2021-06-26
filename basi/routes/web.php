<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContractController;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});
// Route::get('/contract', function () {
//     echo "This is contract Page";
// });
Route::get('/stuff', function () {
    echo "This is stuff Page";
});


// in laravel 7 and 6 rout with controller

// Route::get('path','controllerName@methodName');


Route::get('/contract', [ContractController::class, 'index']);
// Route::get('/contract', [ContractController::class, 'index'])->middleware('age');
