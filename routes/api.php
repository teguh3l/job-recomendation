<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecommendationController;

Route::get('/recommendations', function () {
    return response()->json([
        "message" => "Endpoint ini hanya bisa diakses via POST"
    ]);
});

Route::post('/recommendations', [RecommendationController::class, 'recommend']);
