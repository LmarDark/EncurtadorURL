<?php

use App\Http\Controllers\UrlController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:30,5')->group(function () {
    Route::post('/create', [UrlController::class, 'store']);
});
