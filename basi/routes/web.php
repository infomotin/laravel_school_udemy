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


Route::get('/contractj-ej-jehto', [ContractController::class, 'index'])->name('name');
// Route::get('/contract', [ContractController::class, 'index'])->middleware('age');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
