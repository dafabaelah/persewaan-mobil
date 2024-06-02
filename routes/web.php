<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarsController;
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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::middleware(['guest'])->group(function() {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/store', [AuthController::class, 'store'])->name('store');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::middleware(['auth'])->group(function() {
    Route::post('/logout', [AuthController::class, 'logoutUser'])->name('logoutUser');
    Route::get('/dashboard/cars', [CarsController::class, 'carIndex'])->name('carsAdmin');
    Route::get('/dashboard/cars/create', [CarsController::class, 'carCreate'])->name('carCreate');
    Route::post('/dashboard/cars/store', [CarsController::class, 'carStore'])->name('carStore');
    Route::get('/dashboard/cars/edit/{id}', [CarsController::class, 'carEdit'])->name('carEdit');
    Route::put('/dashboard/cars/update/{id}', [CarsController::class, 'updateCar'])->name('updateCar');
    Route::get('/dashboard/category', [CategoryController::class, 'categoryIndex'])->name('categoryIndex');
    Route::get('/booking/order/{id}', [BookingController::class, 'order'])->name('order');
    Route::post('/booking/order/car', [BookingController::class, 'orderCar'])->name('orderCar');
});

Route::controller(BookingController::class,)->group(function() {
    Route::get('/booking', 'bookingIndex')->name('booking');
});