<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\ReportController;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    // User Management (Admin only)
    Route::resource('users', UserController::class);
    
    // Livestock Management
    Route::resource('animals', AnimalController::class);
    
    // Inventory Management
    Route::resource('inventory', InventoryController::class);
    
    // Financial Records
    Route::resource('financial', FinancialController::class);
    
    // Reports
    Route::resource('reports', ReportController::class);
    Route::get('/animals/export', [AnimalController::class, 'export'])->name('animals.export');
});
