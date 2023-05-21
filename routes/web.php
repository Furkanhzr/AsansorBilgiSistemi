<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Front\HomepageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Online\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::middleware('isLogin')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logOut', [LoginController::class, 'logOut'])->name('logOut');


    Route::prefix('ürünler')->group(function () {
        Route::get('/index',[ProductController::class, 'list'])->name('products.index');
        Route::get('/fetch',[ProductController::class, 'fetch'])->name('products.fetch');
        Route::get('/createIndex',[ProductController::class, 'createIndex'])->name('products.create.index');
        Route::post('/createPost',[ProductController::class, 'createPost'])->name('products.create.post');
        Route::get('/updateIndex/{id}',[ProductController::class, 'updateIndex'])->name('products.update.index');
        Route::post('/updatePost/{id}',[ProductController::class, 'updatePost'])->name('products.update.post');
        Route::post('/delete',[ProductController::class, 'delete'])->name('products.delete');
    });

});


Route::middleware('isUser')->group(function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'loginPost'])->name('login.post');
});




//Route::get('/register', [LoginController::class, 'registerIndex'])->name('register.index');
//Route::get('/register', [LoginController::class, 'registerPost'])->name('register.post');

Route::get('/about', [HomepageController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/products', [ProductController::class, 'index'])->name('products');
