<?php

use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\BlogController;
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
Route::get('/menu/edit/{id}', [MenuController::class , 'menu_edit'])->name('menu.edit');
Route::post('/menu/update/{id}', [MenuController::class , 'menu_update'])->name('menu.update');

// Sub Menu
Route::get('/sub/menu/list', [SubMenuController::class , 'submenu'])->name('submenu');
Route::post('/sub/menu/store', [SubMenuController::class , 'submenu_store'])->name('submenu.store');
Route::get('/sub/menu/delete/{id}', [SubMenuController::class , 'submenu_delete'])->name('submenu.delete');
Route::get('/sub/menu/edit/{id}', [SubMenuController::class , 'submenu_edit'])->name('submenu.edit');
Route::post('/sub/menu/update/{id}', [SubMenuController::class , 'submenu_update'])->name('submenu.update');

// Category
Route::get('/category/list', [BackendController::class , 'category'])->name('category');
Route::post('/category/store', [BackendController::class , 'category_store'])->name('category.store');
Route::get('/category/delete/{id}', [BackendController::class , 'category_delete'])->name('category.delete');
Route::get('/category/edit/{id}', [BackendController::class , 'category_edit'])->name('category.edit');
Route::post('/category/update/{id}', [BackendController::class , 'category_update'])->name('category.update');

// Tag
Route::get('/tag/list', [BackendController::class , 'tag'])->name('tag');
Route::post('/tag/store', [BackendController::class , 'tag_store'])->name('tag.store');
Route::get('/tag/delete/{id}', [BackendController::class , 'tag_delete'])->name('tag.delete');
Route::get('/tag/edit/{id}', [BackendController::class , 'tag_edit'])->name('tag.edit');
Route::post('/tag/update/{id}', [BackendController::class , 'tag_update'])->name('tag.update');

// Blog
Route::get('/write/a/blog', [BlogController::class , 'new_blog'])->name('new.blog');
Route::post('/blog/store', [BlogController::class , 'blog_store'])->name('blog.store');
Route::get('/blog/list', [BlogController::class , 'blog_list'])->name('blog.list');
Route::get('/blog/delete/{id}', [BlogController::class , 'blog_delete'])->name('blog.delete');
Route::get('/blog/view/{id}', [BlogController::class , 'blog_view'])->name('blog.view');
Route::post('/blog/update/{id}', [BlogController::class , 'blog_update'])->name('blog.update');
Route::get('/blog/banner/status/{id}', [BlogController::class , 'blog_banner_status'])->name('blog.banner.status');
// Frontend Blog
Route::get('/blog/single/view/{slug}', [BlogController::class , 'blog_single'])->name('blog_single');
