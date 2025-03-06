<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\BicycleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\CustomerDashboardController;
use App\Http\Controllers\RentalsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;


Route::get('/', [GuestController::class, 'index'])->name('home.guest');
Route::get('/status-transaction', function(){
    return view('rentals.success');
})->name('status-success');
 Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

// Rute customer - login
Route::get('/customer/login', [CustomersController::class, 'loginForm'])->name('customer.login');
Route::post('/customer/login', [CustomersController::class, 'login']);
Route::post('/customer/logout', [CustomersController::class, 'logout'])->name('customer.logout');
Route::get('/customer/register', [CustomersController::class, 'registerForm'])->name('customer.register');
Route::post('/customer/register', [CustomersController::class, 'register']);
// Rute customer - dilindungi middleware
Route::middleware('customer.auth')->group(function () {
    Route::post('/rentals/{id}/transaction', [RentalsController::class, 'transaction'])->name('rentals.transaction');
});
Route::post('/rentals/add-transaction', [RentalsController::class, 'progrestransaction'])->name('rentals.addtransaction');
Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'admin'], function(){
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        Route::resource('customers', CustomersController::class);
        // Route::get('/customers', [CustomersController::class, 'index'])->name('customers.index');
        // Route::post('/customers/store', [CustomersController::class, 'store'])->name('customers.store');
        // Route::get('/customers/edit/{id}', [CustomersController::class, 'edit'])->name('customers.edit');
        // Route::put('/customers/{id}', [CustomersController::class, 'update'])->name('customers.update');
        // Route::delete('/customers/{id}', [CustomersController::class, 'destroy'])->name('customers.destroy');
    
        Route::resource('bicycles', BicycleController::class);
        // Route::get('/bicycles', [BicycleController::class, 'index'])->name('bicycles.index');
        // Route::post('/bicycles/store', [BicycleController::class, 'store'])->name('bicycles.store');
        // Route::get('/bicycles/edit/{id}', [BicycleController::class, 'edit'])->name('bicycles.edit');
        // Route::put('/bicycles/{id}', [BicycleController::class, 'update'])->name('bicycles.update');
        // Route::delete('/bicycles/{id}', [BicycleController::class, 'destroy'])->name('bicycles.destroy');
        Route::resource('rentals', RentalsController::class);
        // Route::get('/rentals', [RentalsController::class, 'index'])->name('rentals.index');
        // Route::get('/rentals/edit/{id}',  [RentalsController::class, 'edit'])->name('rentals.edit');
        // Route::put('/rentals/{id}', [RentalsController::class, 'update'])->name('rentals.update');
        // Route::delete('/rentals/{id}', [RentalsController::class, 'destroy'])->name('rentals.destroy');
    });
    
});     