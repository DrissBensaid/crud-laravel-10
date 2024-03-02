<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // category routes
    Route::get('/categories',[CategoryController::class, 'index'])->name('category.index');
    Route::get('/categories/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/categories/create',[CategoryController::class,'store'])->name('category.store');
    Route::get('categories/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
    Route::put('categories/{id}/edit',[CategoryController::class,'update'])->name('category.update');
    Route::get('categories/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
});

require __DIR__.'/auth.php';
