<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanctumController;

Route::group([
    "middleware" => []
], function () {
    Route::post('sanctum/token', [SanctumController::class, "issueToken"]);
});
