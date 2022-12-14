<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminFrontendController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontendController::class,'index'])->name('front.index');
Route::get('/category',[FrontendController::class,'category'])->name('category');
Route::get('/category/{slug}',[FrontendController::class,'viewCategory'])->name('category-view');
Route::get('/category/{category_slug}/{product_slug}',[FrontendController::class, 'viewProduct'])->name('product-view');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'isAdmin']], function () {

    Route::get('/dashboard',[AdminFrontendController::class,'index'])->name('home.index');
    Route::get('/categories',[CategoryController::class,'index'])->name('category-index');
    Route::get('/create-category',[CategoryController::class,'create'])->name('category-create');
    Route::post('/store-category',[CategoryController::class,'store'])->name('category-store');
    Route::get('/edit-category/{id}',[CategoryController::class,'edit'])->name('category-edit');
    Route::put('/update-category{id}',[CategoryController::class,'update'])->name('category-update');
    Route::get('/delete-category/{id}',[CategoryController::class,'destroy'])->name('category-delete');

    Route::get('/products',[ProductController::class,'index'])->name('products-index');
    Route::get('/create-product',[ProductController::class,'create'])->name('product-create');
    Route::post('/store-product',[ProductController::class,'store'])->name('product-store');
    Route::get('/edit-product/{id}',[ProductController::class,'edit'])->name('product-edit');
    Route::put('/update-product{id}',[ProductController::class,'update'])->name('product-update');
    Route::get('/delete-product/{id}',[ProductController::class,'destroy'])->name('product-delete');
});