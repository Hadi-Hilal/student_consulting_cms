<?php

use Illuminate\Support\Facades\Route;
use Modules\Team\Http\Controllers\Admin\TeamController;


Route::resource('teams', TeamController::class)->except('destroy', 'show');
Route::delete('teams/deleteMulti', [TeamController::class, 'deleteMulti'])->name('teams.deleteMulti');

