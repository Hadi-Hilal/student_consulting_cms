<?php

use Modules\Blog\Http\Controllers\Site\BlogController;

Route::resource('blogs', BlogController::class)->only('index', 'show');
