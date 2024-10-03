<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AtasanController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'RoleMiddleware:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/create', [OrderController::class, 'create'])->name('orders.index');
    Route::post('/orders/create', [OrderController::class, 'store'])->name('orders.create');
    Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');
    Route::post('/orders/{order}/approve', [OrderController::class, 'approveOrder'])->name('orders.approve');
});
Route::get('/atasan/dashboard', [AtasanController::class, 'index'])->name('atasan.dashboard')->middleware('auth');
Route::post('/atasan/approve/{id}', [AtasanController::class, 'approveOrder'])->name('atasan.approve')->middleware('auth');
Route::middleware(['auth', 'RoleMiddleware:atasan'])->group(function () {
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
