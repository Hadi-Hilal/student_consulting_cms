<?php

use Illuminate\Support\Facades\Route;


Route::get('docs', function () {
    return view('core::admin.docs');
})->name('docs');
