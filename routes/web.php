<?php

use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/api')->group(function () {
    Route::get('/create', [LogController::class, 'storeLogData']);
    Route::get('/create-log/{loop}', [LogController::class, 'storeLoop']);
});
