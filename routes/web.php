<?php

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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/cafe', function () {
    return view('cafe');
})->middleware(['auth', 'verified'])->name('cafe');

Route::get('/canteen', function () {
    return view('canteen');
})->middleware(['auth', 'verified'])->name('canteen');

Route::get('/warkop', function () {
    return view('warkop');
})->middleware(['auth', 'verified'])->name('warkop');

Route::get('/fastfood', function () {
    return view('fastfood');
})->middleware(['auth', 'verified'])->name('fastfood');

Route::get('/icecream', function () {
    return view('icecream');
})->middleware(['auth', 'verified'])->name('icecream');

    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/isi', function () {
    return view('isi');
})->name('isi');

require __DIR__.'/auth.php';
