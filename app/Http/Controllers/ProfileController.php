<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Exception;

class ProfileController extends Controller
{
    public function upload(Request $request)
    {
        try {
            // Validate the file
            $request->validate([
                'profile_image' => 'required|image|max:10240' // max 10MB
            ]);

            $user = Auth::user();

            if (!$user) {
                return redirect()->back()->with('error', 'You must be logged in to upload a profile image.');
            }

            // Store the file
            $path = $request->file('profile_image')->store('profile_images', 'public');

            // Save path to user's profile
            $user->profile_image = $path;
            $user->save();

            return redirect()->route('home')->with('success', 'Profile picture updated.');
        } catch (Exception $e) {
            Log::error('Profile image upload failed: ' . $e->getMessage());

            // Show specific error message in alert modal
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

