<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::controller(HomeController::class)->group(function() {

    Route::get('/','home')->name('home');

    Route::get('/show/poste/{post}/{slug}','show')->name('home.show');
    
    Route::get('/show/plus','showPlus')->name('home.show.plus');
    
    Route::get('/show/rubrique/{category}/{name}','showCategory')->name('home.show.category');

});



Route::controller(PostController::class)->name('post.')->group(function() {

    Route::get('/create/post','create')->name('create')->can('show_admin_interface');

    Route::post('/create/post','store')->name('store')->can('show_admin_interface');

    Route::get('/update/post/{post}','create')->name('update')->can('show_admin_interface');

    Route::patch('/update/post/{post}','update')->name('update.action')->can('show_admin_interface');

    Route::delete('/delete/post/{post}','delete')->name('delete.action')->can('show_admin_interface');

});



Route::controller(CategoryController::class)->name('category.')->group(function() {

    Route::get('/create/category','create')->name('create')->can('show_admin_interface');

    Route::post('/create/category','store')->name('store')->can('show_admin_interface');

    Route::get('/update/category/{category}','create')->name('update')->can('show_admin_interface');

    Route::patch('/update/category/{category}','update')->name('update.action')->can('show_admin_interface');

    Route::delete('/delete/category/{category}','delete')->name('delete.action')->can('show_admin_interface');

});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
