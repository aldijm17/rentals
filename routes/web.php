<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\BicycleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RentalsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
Route::get('/', [GuestController::class, 'index'])->name('home.guest');

 Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/customers', [CustomersController::class, 'index'])->name('customers.index');
    Route::post('/customers/store', [CustomersController::class, 'store'])->name('customers.store');
    Route::get('/customers/edit/{id}', [CustomersController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{id}', [CustomersController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{id}', [CustomersController::class, 'destroy'])->name('customers.destroy');
   
    Route::get('/bicycles', [BicycleController::class, 'index'])->name('bicycles.index');
    Route::post('/bicycles/store', [BicycleController::class, 'store'])->name('bicycles.store');
    Route::get('/bicycles/edit/{id}', [BicycleController::class, 'edit'])->name('bicycles.edit');
    Route::put('/bicycles/{id}', [BicycleController::class, 'update'])->name('bicycles.update');
    Route::delete('/bicycles/{id}', [BicycleController::class, 'destroy'])->name('bicycles.destroy');
   
    Route::get('/rentals', [RentalsController::class, 'index'])->name('rentals.index');
    Route::post('/rentals/store', [RentalsController::class, 'store'])->name('rentals.store');
    Route::get('/rentals/edit/{id}',  [RentalsController::class, 'edit'])->name('rentals.edit');
    Route::put('/rentals/{id}', [RentalsController::class, 'update'])->name('rentals.update');
    Route::delete('/rentals/{id}', [RentalsController::class, 'destroy'])->name('rentals.destroy');
    
});