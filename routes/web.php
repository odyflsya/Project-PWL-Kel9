<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CardController;
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


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/redirects', [HomeController::class, 'redirects'])->middleware(['auth'])->name('redirects');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    });

Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', [CardController::class, 'showAllCards'])->name('dashboard');
Route::get('/warkop', [CardController::class, 'index'])->name('warkop')->defaults('category', 'warkop');
Route::get('/cafe', [CardController::class, 'index'])->name('cafe')->defaults('category', 'cafe');
Route::get('/kantin', [CardController::class, 'index'])->name('kantin')->defaults('category', 'kantin');
Route::get('/fastfood', [CardController::class, 'index'])->name('fastfood')->defaults('category', 'fastfood');
Route::get('/icecream', [CardController::class, 'index'])->name('icecream')->defaults('category', 'icecream');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/redirects', [HomeController::class, 'redirects'])->middleware(['auth'])->name('redirects');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    });

Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });


Route::get('/isi', function () {
    return view('isi');
})->name('isi');

require __DIR__.'/auth.php';

