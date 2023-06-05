<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', [\App\Http\Controllers\AuthController::class,"index"])->name('login');
Route::post('/login',[\App\Http\Controllers\AuthController::class,'login'])->name('login.post');

Route::get('register',[\App\Http\Controllers\AuthController::class,'registerForm'])->name('register.form');
Route::post('register',[\App\Http\Controllers\AuthController::class,'registerPost'])->name('register.post');

Route::get('/password-reset',[\App\Http\Controllers\AuthController::class,'reset'])->name('reset');
Route::get('password-reset/{token}',[\App\Http\Controllers\AuthController::class,'resetForm'])->name('reset.form');
Route::post('/password-reset/{token}',[\App\Http\Controllers\AuthController::class,'resetPost'])->name('reset.post');

//
Route::prefix('')->middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\PageController::class,'home'])->name('home');


    Route::prefix('products')->name('product.')->group(function(){
        Route::get('',[\App\Http\Controllers\ProductController::class,'index'])->name('all');
        Route::get('detail/{product_id}',[\App\Http\Controllers\ProductController::class,'get'])->name('detail');

        Route::get('create',[\App\Http\Controllers\ProductController::class,'create'])->name('create');
        Route::post('create',[\App\Http\Controllers\ProductController::class,'store'])->name('create.post');

        Route::get('update/{product_id}',[\App\Http\Controllers\ProductController::class,'edit'])->name('update');
        Route::patch('update/{product_id}',[\App\Http\Controllers\ProductController::class,'update'])->name('update.patch');

        Route::delete('delete/{product_id}',[\App\Http\Controllers\ProductController::class,'delete'])->name('delete');
    });
    Route::prefix('announcements')->name('announcement.')->group(function(){
        Route::get('',[\App\Http\Controllers\AnnouncementController::class,'index'])->name('all');
        Route::get('detail/{announcement_id}',[\App\Http\Controllers\AnnouncementController::class,'get'])->name('detail');

        Route::get('create',[\App\Http\Controllers\AnnouncementController::class,'create'])->name('create');
        Route::post('create',[\App\Http\Controllers\AnnouncementController::class,'store'])->name('create.post');

        Route::get('update/{announcement_id}',[\App\Http\Controllers\AnnouncementController::class,'edit'])->name('update');
        Route::patch('update/{announcement_id}',[\App\Http\Controllers\AnnouncementController::class,'update'])->name('update.patch');

        Route::delete('delete/{announcement_id}',[\App\Http\Controllers\AnnouncementController::class,'delete'])->name('delete');
    });
    Route::prefix('messages')->name('messages.')->group(function(){
        Route::get('',[\App\Http\Controllers\MessageController::class,'index'])->name('all');
        Route::get('detail/{receive_id}',[\App\Http\Controllers\MessageController::class,'get'])->name('detail');

        Route::get('create',[\App\Http\Controllers\MessageController::class,'create'])->name('create');
        Route::post('create',[\App\Http\Controllers\MessageController::class,'store'])->name('create.post');

        Route::get('update/{message_id}',[\App\Http\Controllers\MessageController::class,'edit'])->name('update');
        Route::patch('update/{message_id}',[\App\Http\Controllers\MessageController::class,'update'])->name('update.patch');

        Route::delete('delete/{message_id}',[\App\Http\Controllers\MessageController::class,'delete'])->name('delete');
    });
    Route::prefix('users')->name('user.')->group(function(){
        Route::get('',[\App\Http\Controllers\UserController::class,'index'])->name('all');
        Route::get('detail/{user_id}',[\App\Http\Controllers\UserController::class,'get'])->name('detail');

        Route::get('create',[\App\Http\Controllers\UserController::class,'create'])->name('create');
        Route::post('create',[\App\Http\Controllers\UserController::class,'store'])->name('create.post');

        Route::get('update/{user_id}',[\App\Http\Controllers\UserController::class,'edit'])->name('update');
        Route::patch('update/{user_id}',[\App\Http\Controllers\UserController::class,'update'])->name('update.patch');

        Route::delete('delete/{user_id}',[\App\Http\Controllers\UserController::class,'delete'])->name('delete');
    });


    Route::prefix('roles')->name('role.')->group(function(){
        Route::get('',[\App\Http\Controllers\RoleController::class,'index'])->name('all');

        Route::get('create',[\App\Http\Controllers\RoleController::class,'createPage'])->name('create.page');
        Route::post('create',[\App\Http\Controllers\RoleController::class,'create'])->name('create');

        Route::get('edit/{role_id}',[\App\Http\Controllers\RoleController::class,'updatePage'])->name('update.page');;
        Route::patch('edit/{role_id}',[\App\Http\Controllers\RoleController::class,'update'])->name('update');;

        Route::delete('delete/{role_id?}',[\App\Http\Controllers\RoleController::class,'delete'])->name('delete');
    });
});
