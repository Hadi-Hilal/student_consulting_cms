<?php

use Illuminate\Support\Facades\Route;
use Modules\Contact\Http\Controllers\Admin\ContactController;


Route::prefix('contacts')->name('contacts.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::delete('/deleteMulti', [ContactController::class, 'deleteMulti'])->name('deleteMulti');
    Route::get('/export', [ContactController::class, 'export'])->name('export');
});
