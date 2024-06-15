<?php

use Illuminate\Support\Facades\Route;
use Modules\Settings\Http\Controllers\Admin\SeoController;
use Modules\Settings\Http\Controllers\Admin\SettingsController;

Route::resource('settings', SettingsController::class)->only('index', 'store');
Route::resource('seo', SeoController::class)->only('index', 'store');

