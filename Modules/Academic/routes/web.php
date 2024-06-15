<?php

use Modules\Academic\Http\Controllers\Site\UniversityController;


Route::get('program/filter', [UniversityController::class, 'program_filter'])->name('program.filter');
Route::get('program/download_PDF/{program}', [UniversityController::class, 'download_PDF'])->name('program.download_PDF');

Route::get('universities/search_results', [UniversityController::class, 'search_results'])->name('universities.search_results');

Route::resource('universities', UniversityController::class)->only('index', 'show');


