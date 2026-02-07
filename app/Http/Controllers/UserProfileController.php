<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return response()->json([
            "profile" => $user->profile
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'skills' => 'nullable|string',
            'tools' => 'nullable|string',
            'interests' => 'nullable|array',
            'experience' => 'nullable|string',
        ]);

        $profile = UserProfile::updateOrCreate(
            ['user_id' => $user->id],
            $data
        );

        return response()->json([
            "message" => "Profile updated",
            "profile" => $profile
        ]);
    }
}
