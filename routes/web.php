<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'isAdmin']], function () {

    Route::get('/dashboard',[FrontendController::class,'index'])->name('home.index');
    Route::get('/categories',[CategoryController::class,'index'])->name('category-index');
    Route::get('/create-category',[CategoryController::class,'create'])->name('category-create');
    Route::post('/store-category',[CategoryController::class,'store'])->name('category-store');
    Route::get('/edit-category/{id}',[CategoryController::class,'edit'])->name('category-edit');
    Route::put('/update-category{id}',[CategoryController::class,'update'])->name('category-update');
    Route::get('/delete-category/{id}',[CategoryController::class,'destroy'])->name('category-delete');
});