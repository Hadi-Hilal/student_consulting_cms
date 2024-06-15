<?php

use Modules\Faq\Http\Controllers\Site\FaqController;

Route::get('faqs', [FaqController::class, 'index'])->name('faqs.index');
