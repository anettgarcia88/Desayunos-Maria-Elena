<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagInicioController;
use App\Http\Controllers\CarritoController;


 Route::get('/', [PagInicioController::class, 'index'])->name('paghome');


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('productos', ProductoController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
});

Route::get('/users/{id}/edit', [UserController::class, 'edit']);
Route::post('/users', [UserController::class, 'store']);
Route::post('/users/{id}', [UserController::class, 'update']);


//Route::get('/users/{id}', 'UserController@show')->name('users.show');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/profile/{id}/edit', [UserController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{id}', [UserController::class, 'update'])->name('profile.update');

Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito');

Route::post('/productos/update-quantity', [ProductoController::class, 'updateQuantity'])->name('reserva');

Route::post('/productos/reserve', [ProductoController::class, 'reserve'])->name('productos.reserve');