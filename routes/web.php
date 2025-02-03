<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagInicioController;
use App\Http\Controllers\CarritoController;


Route::get('/', function () {
    return redirect()->route('paghome');
});

Auth::routes();



Route::middleware(['auth'])->group(function () {
    Route::resource('productos', ProductoController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
});

//Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

//Route::get('/users/{id}', 'UserController@show')->name('users.show');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/profile/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('profile.update');
Route::get('/inicio', [PagInicioController::class, 'index'])->name('paghome');

Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito');

//Route::get('/carrito/domicilio', [domicilioController::class, 'index'])->name('domicilio');
Route::post('/productos/update-quantity', [ProductoController::class, 'updateQuantity'])->name('reserva');

//Route::get('/carrito/reserva', [reservaController::class, 'index'])->name('reserva');

Route::post('/productos/reserve', [ProductoController::class, 'reserve'])->name('productos.reserve');