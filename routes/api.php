<?php

use App\Http\Controllers\Api\ProdiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
     Route::apiResource('/prodi',ProdiController::class);

    Route::get('/user', function (Request $request) {
    return $request->user();
    });
});
