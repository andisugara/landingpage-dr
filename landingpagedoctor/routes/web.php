<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContentBlockController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/layanan', [FrontendController::class, 'services'])->name('services.index');
Route::get('/layanan/{slug}', [FrontendController::class, 'serviceDetail'])->name('services.show');
Route::get('/promo', [FrontendController::class, 'promotions'])->name('promotions.index');

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'loginForm'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('services', ServiceController::class)->except(['show']);
    Route::resource('promotions', PromotionController::class)->except(['show']);
    Route::resource('content-blocks', ContentBlockController::class)->except(['show']);
});
