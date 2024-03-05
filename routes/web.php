<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
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
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/about', function () {
    return view('frontEnd.about');
})->name('about');
Route::get('/event', function () {
    return view('frontEnd.event');
})->name('event');
Route::get('/single-event', function () {
    return view('frontEnd.single-event');
})->name('single-event');
Route::get('/indexdash', function () {
    return view('dashboard.index');
})->name('index');
Route::get('/dash', function () {
    return view('dashboard.dash');
})->name('dash');

Route::resource('events', EventController::class);
Route::resource('categories', CategoryController::class);
require __DIR__.'/auth.php';
