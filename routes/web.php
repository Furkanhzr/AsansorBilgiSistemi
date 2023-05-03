<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomepageController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Online\DashboardController;

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

Route::get('/', [HomepageController::   class, 'index'])->name('homepage');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/loginPost', [LoginController::class, 'loginPost'])->name('loginPost');
Route::get('/about', [HomepageController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/products', [ProductController::class, 'index'])->name('products');
