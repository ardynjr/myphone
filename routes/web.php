<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhoneController;

Route::get('/', [PhoneController::class, 'index'])->name('phones.index');
Route::get('/search', [PhoneController::class, 'search'])->name('phones.search');
Route::get('/phone/{phoneId}', [PhoneController::class, 'showPhone'])->name('phones.detail');
