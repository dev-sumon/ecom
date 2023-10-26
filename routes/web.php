<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.home');
})->name('welcome');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard',[AdminController::class, 'admin'])->name('admin.dashboard');

    Route::group(['as' => 'user.', 'prefix' => 'user'], function () {
        Route::get('index',[AdminUserController::class, 'index'])->name('index');
        Route::get('create',[AdminUserController::class, 'create'])->name('create');
        Route::post('store',[AdminUserController::class, 'store'])->name('store');
        Route::get('view/{id}',[AdminUserController::class, 'view'])->name('view');
        Route::get('edit/{id}',[AdminUserController::class, 'edit'])->name('edit');
        Route::put('update/{id}',[AdminUserController::class, 'update'])->name('update');
        Route::get('status/{id}',[AdminUserController::class, 'status'])->name('status');
        Route::get('delete/{id}',[AdminUserController::class, 'delete'])->name('delete');
    });
    Route::group(['as' => 'product.', 'prefix' => 'product'], function () {
        // Route::get('index',[AdminUserController::class, 'index'])->name('index');
        // Route::get('create',[AdminUserController::class, 'create'])->name('create');
        // Route::post('store',[AdminUserController::class, 'store'])->name('store');
        // Route::get('view/{id}',[AdminUserController::class, 'view'])->name('view');
        // Route::get('edit/{id}',[AdminUserController::class, 'edit'])->name('edit');
        // Route::put('update/{id}',[AdminUserController::class, 'update'])->name('update');
        // Route::get('status/{id}',[AdminUserController::class, 'status'])->name('status');
        // Route::get('delete/{id}',[AdminUserController::class, 'delete'])->name('delete');

        Route::group(['as' => 'category.', 'prefix' => 'category'], function () {
            Route::get('index',[CategoryController::class, 'index'])->name('index');
            Route::get('create',[CategoryController::class, 'create'])->name('create');
            Route::post('store',[CategoryController::class, 'store'])->name('store');
            Route::get('view/{id}',[CategoryController::class, 'view'])->name('view');
            Route::get('edit/{id}',[CategoryController::class, 'edit'])->name('edit');
            Route::put('update/{id}',[CategoryController::class, 'update'])->name('update');
            Route::get('status/{id}',[CategoryController::class, 'status'])->name('status');
            Route::get('delete/{id}',[CategoryController::class, 'delete'])->name('delete');
        });
    });




});

Route::middleware(['auth', 'user'])->group(function () {

    Route::get('user/dashboard',[UserController::class, 'user'])->name('user.dashboard');
});
