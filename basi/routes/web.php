<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
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
// category
Route::get('/category', [CategoryController::class, 'allCat'])->name('category');
Route::post('/category/add', [CategoryController::class, 'addcategory'])->name('store.cat');
Route::get('category/edit/{id}', [CategoryController::class, 'editCategory']);
Route::post('category/update/{id}', [CategoryController::class, 'updateCategory']);
Route::get('soft/delete/{id}', [CategoryController::class, 'softCategory']);
Route::get('category/restore/{id}', [CategoryController::class, 'restore']);
Route::get('category/delete/{id}', [CategoryController::class, 'delete']);
// brand some thing doing
Route::get('brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('brand/add', [BrandController::class, 'AddBrand'])->name('store.band');
Route::get('band/edit/{id}', [BrandController::class, 'editBrand']);
Route::post('band/update/{id}', [BrandController::class, 'updateBrand']);
Route::get('band/delete/{id}', [BrandController::class, 'delete']);


// Route::get('/contract', [ContractController::class, 'index'])->middleware('age');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $user = User::all();

    // query builder example form api based data views
    $user = DB::table('users')->get();

    return view('dashboard',compact('user'));
})->name('dashboard');
