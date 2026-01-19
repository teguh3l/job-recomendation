<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Job;

class RecommendationController extends Controller
{
    public function recommend(Request $request)
    {
        $profile = $request->input('profile');

        // Ambil semua job
        $jobs = Job::all(['id', 'title', 'description'])->toArray();

        // Kirim ke Python
        $response = Http::post('http://127.0.0.1:8001/recommend', [
            'user_profile' => $profile,
            'jobs' => $jobs
        ]);

        return $response->json();
    }
}
