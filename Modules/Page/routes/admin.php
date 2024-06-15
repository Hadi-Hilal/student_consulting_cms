<?php

use Illuminate\Support\Facades\Route;
use Modules\Page\Http\Controllers\Admin\PageController;


Route::resource('pages', PageController::class)->except('destroy', 'show');
Route::delete('pages/deleteMulti', [PageController::class, 'deleteMulti'])->name('pages.deleteMulti');

