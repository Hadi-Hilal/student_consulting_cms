<?php

use Illuminate\Support\Facades\Route;
use Modules\Newsletter\Http\Controllers\Admin\NewsletterController;


Route::resource('newsletters', NewsletterController::class)->only('index', 'create', 'store');
Route::delete('newsletters/deleteMulti', [NewsletterController::class, 'deleteMulti'])->name('newsletters.deleteMulti');

