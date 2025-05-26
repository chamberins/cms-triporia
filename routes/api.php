<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\DestinationApiController;

// ...existing code...

Route::prefix('v1')->group(function () {
    Route::apiResource('categories', CategoryApiController::class);
    Route::apiResource('destinations', DestinationApiController::class);
});
// ...existing code...