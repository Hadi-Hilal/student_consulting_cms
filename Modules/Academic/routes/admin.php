<?php

use Illuminate\Support\Facades\Route;
use Modules\Academic\Http\Controllers\Admin\ProgramController;
use Modules\Academic\Http\Controllers\Admin\UniversityController;

Route::resource('programs', ProgramController::class)->except('destroy', 'show');
Route::delete('programs/deleteMulti', [ProgramController::class, 'deleteMulti'])->name('programs.deleteMulti');

Route::resource('universities', UniversityController::class)->except('destroy', 'show');
Route::delete('universities/deleteMulti', [UniversityController::class, 'deleteMulti'])->name('universities.deleteMulti');
Route::get('universities/export', [UniversityController::class, 'export'])->name('universities.export');
