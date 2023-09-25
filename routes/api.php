<?php

use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;


Route::middleware('rate.limit:60,1')->group(function () {
    Route::get('/requests', [RequestController::class, 'index']);
    Route::post('/requests', [RequestController::class, 'save']);
    Route::put('/requests', [RequestController::class, 'update']);
});
