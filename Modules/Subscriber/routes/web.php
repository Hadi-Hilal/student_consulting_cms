<?php

use Modules\Subscriber\Http\Controllers\Site\SubscriberController;

Route::resource('subscribe', SubscriberController::class)->only('store');
