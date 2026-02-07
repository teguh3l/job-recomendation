<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PersonalizedRecommendationController;
use App\Models\Job;
use App\Models\JobCategory;

Route::get('/recommendations', function () {
    return response()->json([
        "message" => "Endpoint ini hanya bisa diakses via POST"
    ]);
});

Route::post('/recommendations', [RecommendationController::class, 'recommend']);

Route::get('/categories', function () {
    return JobCategory::select('id', 'name')->get();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/user/profile', [UserProfileController::class, 'show']);
    Route::post('/user/profile', [UserProfileController::class, 'update']);

    Route::get('/user/recommendations', [PersonalizedRecommendationController::class, 'personalized']);

    Route::get('/jobs/{id}', function ($id) {
        return Job::with('category:id,name')->findOrFail($id);
    });
});
