<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContractController;
use App\Http\Controllers\CategoryController;

// for querey builder
use Illuminate\Support\Facades\DB;
// for working with model
use App\Models\User;

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

Route::get('/category', [CategoryController::class, 'allCat'])->name('category');

Route::post('/category/add', [CategoryController::class, 'addcategory'])->name('store.cat');
// Route::post('/category/add', [CategoryController::class, 'addcategory'])->name('store.cat');
Route::get('category/edit/{id}', [CategoryController::class, 'editCategory']);







// Route::get('/contract', [ContractController::class, 'index'])->middleware('age');




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $user = User::all();

    // query builder example form api based data views
    $user = DB::table('users')->get();

    return view('dashboard',compact('user'));
})->name('dashboard');
