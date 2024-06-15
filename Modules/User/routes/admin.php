<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\Admin\AdminController;
use Modules\User\Http\Controllers\Admin\DashboardController;
use Modules\User\Http\Controllers\Admin\ProfileController;
use Modules\User\Http\Controllers\Admin\UserController;

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::delete('/deleteMulti', [UserController::class, 'deleteMulti'])->name('deleteMulti');
    Route::get('/switch/{user}', [UserController::class, 'switch'])->name('switch');
    Route::get('/export', [UserController::class, 'export'])->name('export');
});

Route::prefix('admins')->name('admins.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::delete('/deleteMulti', [AdminController::class, 'deleteMulti'])->name('deleteMulti');
    Route::get('/switch/{user}', [AdminController::class, 'switch'])->name('switch');
    Route::get('/assign/{user}', [AdminController::class, 'assign'])->name('assign');
});
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
