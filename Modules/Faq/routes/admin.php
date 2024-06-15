<?php

use Illuminate\Support\Facades\Route;
use Modules\Faq\Http\Controllers\Admin\FaqController;


Route::resource('faqs', FaqController::class)->except('destroy', 'show');
Route::delete('faqs/deleteMulti', [FaqController::class, 'deleteMulti'])->name('faqs.deleteMulti');

