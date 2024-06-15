<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\Admin\CategoryController;
use Modules\Blog\Http\Controllers\Admin\PostController;


Route::prefix('blogs')->name('blogs.')->group(function () {

    Route::resource('categories', CategoryController::class)->only('index', 'store', 'update');
    Route::delete('categories/deleteMulti', [CategoryController::class, 'deleteMulti'])->name('categories.deleteMulti');

    Route::resource('posts', PostController::class)->except('show', 'destroy');
    Route::delete('posts/deleteMulti', [PostController::class, 'deleteMulti'])->name('posts.deleteMulti');

});

