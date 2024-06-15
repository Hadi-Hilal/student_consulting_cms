<?php

use Modules\Contact\Http\Controllers\Site\ContactController;

Route::resource('contact-us', ContactController::class)->only('index', 'store');


