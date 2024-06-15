<?php

use Illuminate\Support\Facades\Route;
use Modules\FileManger\Http\Controllers\Admin\FileMangerController;
use UniSharp\LaravelFilemanager\Lfm;


Route::get('filemanager', [FileMangerController::class, 'index'])->name('filemanager.index');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});

