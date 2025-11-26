<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Mail\WelcomeMail;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Step 1: Basic format validation (structure only)
        $request->validate([
            'email'    => 'required|email',
            'name'     => 'required|string|max:255',
            'password' => 'required|min:6',
            'password_confirmation' => 'required',
        ]);

        // Step 2: Check if email or username already exists
        if (User::where('email', $request->email)->exists()) {
            return back()->with('error', 'Email Already Registered.');
        }

        if (User::where('name', $request->name)->exists()) {
            return back()->with('error', 'Username Already Taken.');
        }

        // Step 3: Check if passwords match
        if ($request->password !== $request->password_confirmation) {
            return back()->with('error', 'Passwords Do Not Match.');
        }

//         if (User::where('email', $request->email)->where('is_google_user', true)->exists()) {
//     return back()->with('error', 'Email already associated with a Google account.');
// }


        // Step 4: Create user
        $user = User::create([
            'id'       => Str::random(9),
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'Profile_img' => NULL,
            'is_google_user' => false,
        ]);

        Auth::login($user);
        

        // Mail::to($newUser->email)->send(new WelcomeMail($newUser));

        return redirect('/A91kfZpXrL38sTYvq2nJ');
    }

    //login

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    // Check if the user exists by email or username
    $user = User::where('email', $credentials['email'])
                ->orWhere('name', $credentials['email'])
                ->first();

    if (!$user || !Hash::check($credentials['password'], $user->password)) {
        return back()->with('error', 'Invalid Username or Password.');
    }

    Auth::login($user);
    return redirect('/');
}

}


