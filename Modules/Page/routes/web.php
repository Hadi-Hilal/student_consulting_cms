<?php

use Modules\Page\Http\Controllers\Site\PageController;

Route::get('p/{slug}', [PageController::class, 'show'])->name('pages.show');
