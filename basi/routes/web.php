<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\MultiController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;
use App\Models\User;




// describedAs Route
Route::get('/', function () {
    $brands = DB::table('brands')->get();
    return view('home1',compact('brands'));
});
// describedAs Route
Route::get('/about', function () {
    return view('about');
});

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
Route::get('band/edit/{id}', [BrandController::class, 'editBrand'])->name('band.edit');
Route::post('band/update/{id}', [BrandController::class, 'updateBrand']);
Route::get('band/delete/{id}', [BrandController::class, 'delete']);
//multi picture upload
Route::get('multiphoto/all',[MultiController::class, 'AllImage'])->name('multi.image');
Route::post('multiphoto/add', [MultiController::class, 'AddImages'])->name('save.images');
// admin panel route
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('slider/add', [HomeController::class, 'AddSlider'])->name('store.slider');
Route::post('slider/insert', [HomeController::class, 'insertSlider'])->name('insertSlider');
Route::get('slider/edit/{id}', [HomeController::class, 'EditSlider']);
Route::post('slider/update/{id}', [HomeController::class, 'updateSlider']);
Route::get('slider/delete/{id}', [HomeController::class, 'HomeSlider']);





// Route::get('/contract', [ContractController::class, 'index'])->middleware('age');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $user = User::all();

    // query builder example form api based data views
    $user = DB::table('users')->get();

    return view('admin.index',compact('user'));
})->name('dashboard');


// for email verification
Route::get('/email/verify',
    function () {
        return view('auth.verify-email');
    }
)->middleware('auth')->name('verification.notice');

Route::get('user/logout',[MultiController::class,'logout'])->name('user.logout');
