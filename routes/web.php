<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RequestController;

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

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Dashboard::class, 'index']);
    //eli bech yzid urelet fel back yzidhom te7t hedhi ya bbiet
});

Route::middleware(['auth', 'client'])->group(function () {
    Route::get('/front', [App\Http\Controllers\TemplateController::class, 'index']);
    //eli bech yzid urelet fel front yzidhom te7t hedhi ya bbiet
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('reviews', ReviewController::class);
Route::get('reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
Route::put('reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::get('reviews/{review}/show', [ReviewController::class, 'show'])->name('reviews.show');
Route::delete('reviews/{review}/delete', [ReviewController::class, 'delete'])->name('reviews.delete');
Route::post('reviews/store', [ReviewController::class, 'store'])->name('reviews.store');
Route::put('reviews/{review}/update', [ReviewController::class, 'update'])->name('reviews.update');
// request
Route::resource('requests', RequestController::class);
Route::get('requests/create', [RequestController::class, 'create'])->name('requests.create');
Route::put('requests/{request}/edit', [RequestController::class, 'edit'])->name('requests.edit');
Route::get('requests/{request}/show', [RequestController::class, 'show'])->name('requests.show');
Route::delete('requests/{request}/delete', [RequestController::class, 'delete'])->name('requests.delete');
Route::post('requests/store', [RequestController::class, 'store'])->name('requests.store');
Route::put('requests/{request}/update', [RequestController::class, 'update'])->name('requests.update');
