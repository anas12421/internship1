<?php

use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Index or Home Page
Route::get('/', [FrontendController::class , 'home'])->name('home');


// Admin Dashboard
Route::get('/dashboard', [BackendController::class , 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


// Route::middleware('auth')->group(function () {
    //     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // });

    // Logout
    require __DIR__.'/auth.php';

// Users
Route::get('/user/list', [UserController::class , 'user'])->name('user');
Route::post('/user/store', [UserController::class , 'user_store'])->name('user.store');
Route::get('/user/delete/{id}', [UserController::class , 'user_delete'])->name('user.delete');
Route::get('/user/edit/{id}', [UserController::class , 'user_edit'])->name('user.edit');
Route::post('/user/update/{id}', [UserController::class , 'user_update'])->name('user.update');

// Auth User
Route::get('/authorized/user/profile', [AuthUserController::class , 'auth_user'])->name('auth.user');
Route::post('/authorized/user/info/update', [AuthUserController::class , 'auth_user_info_update'])->name('auth.info.update');
Route::post('/authorized/user/password/update', [AuthUserController::class , 'auth_user_password_update'])->name('auth.password.update');
Route::post('/authorized/user/photo/update', [AuthUserController::class , 'auth_user_photo_update'])->name('auth.photo.update');

// Menu
Route::get('/menu/list', [MenuController::class , 'menu'])->name('menu');
Route::post('/menu/store', [MenuController::class , 'menu_store'])->name('menu.store');
Route::get('/menu/delete/{id}', [MenuController::class , 'menu_delete'])->name('menu.delete');

// Sub Menu
Route::get('/sub/menu/list', [SubMenuController::class , 'submenu'])->name('submenu');
Route::post('/sub/menu/store', [SubMenuController::class , 'submenu_store'])->name('submenu.store');
Route::get('/sub/menu/delete/{id}', [SubMenuController::class , 'submenu_delete'])->name('submenu.delete');
