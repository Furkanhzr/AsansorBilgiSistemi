<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FaultController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RepairController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\HomepageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Online\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ElevatorController;
use App\Http\Controllers\Admin\ElevatorTypeController;
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
    Route::prefix('ariza')->group(function () {
        Route::get('/index',[FaultController::class, 'index'])->name('fault.index');
        Route::get('/fetch',[FaultController::class, 'fetch'])->name('faults.fetch');
        Route::get('/createIndex',[FaultController::class, 'createIndex'])->name('fault.create.index');
        Route::post('/createPost',[FaultController::class, 'createPost'])->name('fault.create.post');
        Route::get('/phonecheck',[FaultController::class, 'checkUserPhone'])->name('fault.user.phonecheck');
        Route::get('/userelevators',[FaultController::class, 'getUserElevator'])->name('fault.user.elevators');
    });

    Route::prefix('bakim')->group(function () {
        Route::get('/index',[RepairController::class, 'index'])->name('repair.index');
        Route::get('/createIndex',[RepairController::class, 'createIndex'])->name('repair.create.index');
        Route::post('/createPost',[RepairController::class, 'createPost'])->name('repair.create.post');


    });

    Route::prefix('asansorler')->group(function () {
        Route::get('/index',[ElevatorController::class, 'index'])->name('elevators.index');
        Route::get('/fetch',[ElevatorController::class, 'fetch'])->name('elevators.fetch');
        Route::post('/create',[ElevatorController::class, 'create'])->name('elevators.create');
        Route::get('/edit/{id}',[ElevatorController::class, 'edit'])->name('elevators.edit');
        Route::post('/update',[ElevatorController::class, 'update'])->name('elevators.update');
        Route::post('/delete',[ElevatorController::class, 'delete'])->name('elevators.delete');

        Route::prefix('asansor-turleri')->group(function () {
            Route::get('/index',[ElevatorTypeController::class, 'index'])->name('elevator_types.index');
            Route::get('/fetch',[ElevatorTypeController::class, 'fetch'])->name('elevator_types.fetch');
            Route::post('/create',[ElevatorTypeController::class, 'create'])->name('elevator_types.create');
            Route::get('/edit/{id}',[ElevatorTypeController::class, 'edit'])->name('elevator_types.edit');
            Route::post('/update',[ElevatorTypeController::class, 'update'])->name('elevator_types.update');
            Route::post('/delete',[ElevatorTypeController::class, 'delete'])->name('elevator_types.delete');
        });

    });



    Route::prefix('user')->group(function () {
        Route::get('/index',[UserController::class, 'index'])->name('user.index');
        Route::get('/createIndex',[UserController::class, 'createIndex'])->name('user.create.index');
        Route::post('/createPost',[UserController::class, 'createPost'])->name('user.create.post');
        Route::get('/getCity',[UserController::class,'getCity'])->name('get.city');
        Route::get('/getTown',[UserController::class,'getTown'])->name('get.town');
        Route::get('/getNeighbourhood',[UserController::class,'getNeighbourhood'])->name('get.neighbourhood');
        Route::get('/getStreet',[UserController::class,'getStreet'])->name('get.street');
        Route::get('/fetch',[UserController::class, 'fetch'])->name('user.fetch');

    });

    Route::prefix('iletisimler')->group(function () {
        Route::get('/index',[ContactController::class, 'index'])->name('contacts.index');
        Route::get('/fetch',[ContactController::class, 'fetch'])->name('contacts.fetch');
        Route::get('/list',[ContactController::class, 'list'])->name('contacts.list');
        Route::post('/check',[ContactController::class, 'check'])->name('contacts.check');
        Route::post('/uncheck',[ContactController::class, 'uncheck'])->name('contacts.uncheck');
        Route::get('/createIndex',[ContactController::class, 'createIndex'])->name('contacts.create.index');
        Route::post('/createPost',[ContactController::class, 'createPost'])->name('contacts.create.post');
        Route::get('/updateIndex/{id}',[ContactController::class, 'updateIndex'])->name('contacts.update.index');
        Route::post('/updatePost/{id}',[ContactController::class, 'updatePost'])->name('contacts.update.post');
        Route::post('/delete',[ContactController::class, 'delete'])->name('contacts.delete');
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
Route::get('/products/{id}', [ProductController::class, 'single'])->name('products.single');
