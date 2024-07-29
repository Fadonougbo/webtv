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

Route::get('/',[HomeController::class,'home'])->name('home');

Route::get('/create/post',[PostController::class,'create'])->name('post.create');

Route::post('/create/post',[PostController::class,'store'])->name('post.store');




Route::get('/create/category',[CategoryController::class,'create'])->name('category.create');

Route::post('/create/category',[CategoryController::class,'store'])->name('category.store');

Route::get('/update/category/{category}',[CategoryController::class,'create'])->name('category.update');

Route::patch('/update/category/{category}',[CategoryController::class,'update'])->name('category.update.action');

Route::delete('/delete/category/{category}',[CategoryController::class,'delete'])->name('category.delete.action');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
