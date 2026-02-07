<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;

class PersonalizedRecommendationController extends Controller
{
    public function personalized(Request $request)
    {
        $user = Auth::user();

        if (!$user->profile) {
            return response()->json([
                "recommendations" => []
            ]);
        }

        // Build profile string
        $profileText = trim(
            ($user->profile->skills ?? '') . ' ' .
                ($user->profile->tools ?? '') . ' ' .
                implode(' ', $user->profile->interests ?? []) . ' ' .
                ($user->profile->experience ?? '')
        );

        $jobs = Job::select('id', 'title', 'description')->get()->toArray();

        $response = Http::post("http://127.0.0.1:8001/recommend", [
            "user_profile" => $profileText,
            "jobs" => $jobs
        ]);

        $recs = collect($response->json()['recommendations'])
            ->sortByDesc('similarity')
            ->take(10)              // 🔥 TOP 10 SAJA
            ->values();

        return response()->json([
            "recommendations" => $recs
        ]);
    }
}
