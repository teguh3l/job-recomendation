<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Job;

class RecommendationController extends Controller
{
    public function recommend(Request $request)
    {
        // HARUS user_profile karena Python butuh itu
        $profile = $request->input('user_profile');

        if (!$profile) {
            return response()->json([
                "error" => "user_profile field is required"
            ], 400);
        }

        // Ambil job + kategori
        $jobs = Job::with('category:id,name')
            ->get(['id', 'title', 'description', 'category_id'])
            ->toArray();

        // Kirim ke Python
        $response = Http::post('http://127.0.0.1:8001/recommend', [
            'user_profile' => $profile,
            'jobs' => $jobs
        ]);

        return $response->json();
    }
}
