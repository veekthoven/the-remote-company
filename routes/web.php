<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourcesController;

Route::get('/', [ResourcesController::class, 'home'])->name('home');

Route::get('/admin', [ResourcesController::class, 'admin'])->name('admin');

Route::get('/resources/{resource}', [ResourcesController::class, 'show']);

Route::post('/resources', [ResourcesController::class, 'store']);

Route::delete('/resources/{resource}', [ResourcesController::class, 'destroy']);

Route::get('/resources/edit/{resource}', [ResourcesController::class, 'edit']);

Route::post('/resources/{resource}', [ResourcesController::class, 'update']);
