<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();


Route::get('/plans', [PlanController::class, 'index']);
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('domains', DomainController::class)->only(['store', 'update', 'destroy']);

    Route::post('/plans/{plan}', [PlanController::class, 'update']);
    Route::get('/plans', [PlanController::class, 'index']);
    Route::post('/plans/buy/{plan}', [PlanController::class, 'buy']);
    Route::get('/users', [UserController::class, 'index'])->middleware(['auth', 'is_admin']);
});

Route::get('/', function () {
    return redirect('/login');
});
