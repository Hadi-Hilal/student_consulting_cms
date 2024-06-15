<?php

use Illuminate\Support\Facades\Route;
use Modules\Testimonial\Http\Controllers\Admin\TestimonialController;


Route::resource('testimonials', TestimonialController::class)->except('destroy', 'show');
Route::delete('testimonials/deleteMulti', [TestimonialController::class, 'deleteMulti'])->name('testimonials.deleteMulti');

