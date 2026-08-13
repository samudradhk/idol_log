<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PublicIdolController;
use App\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Route;

// Redirect root to dashboard
Route::get('/', fn () => redirect()->route('dashboard'));

// Public idol pages — accessible by guests and authenticated users
Route::get('/idols', [PublicIdolController::class, 'index'])->name('idols.index');
Route::get('/idols/{idolName}', [PublicIdolController::class, 'show'])->name('idols.show');

// TODO: dashboard and statistics page need user to login first.
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/activities', ActivityController::class)->except(['show']);
    Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics');
});

// Authentication routes (placeholder — students implement logic)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// TODO: Implement Localization route here to switch locale
Route::get('/lang/{locale}', [LanguageController::class, 'changeLanguage'])->name('change-language');


