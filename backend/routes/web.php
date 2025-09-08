<?php

use App\Http\Controllers\UrlController;
use App\Http\Middleware\BlockSwaggerRequests;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:1,4')->group(function () {
    Route::get('/health', function() {
        return response()->json(['status' => 'ok']);
    });
});

Route::get('/{code}', [UrlController::class, 'redirect'])->middleware(BlockSwaggerRequests::class);
