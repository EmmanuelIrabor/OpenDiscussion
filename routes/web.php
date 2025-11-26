<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Mail\WelcomeMail;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

// Route::get('/', function () {
//     return view('index');
// })->middleware('auth')->name('home');



Route::get('/Login', function () {
    return view('Login.index');
})->name('login');

Route::get('/Register', function () {
    return view('Register.index');
})->name('register');

Route::get('/A91kfZpXrL38sTYvq2nJ', function () {
    return view('A91kfZpXrL38sTYvq2nJ.index');
})->name('a91kfZpXrL38sTYvq2nJ');

Route::get('/Profile-Img', function () {
    return view('Profile-Img.index');
})->name('profile-img');

// Route::get('/User-Profile', function () {
//     return view('User-Profile.index');
// })->name('user-profile');

Route::get('/Add-A-Discussion',function(){

    return view('Add-A-Discussion.index');
})->name('add-a-discussion');


Route::get('/Posts',function(){

    return view('Posts.index');
})->name('posts');

Route::get('/Add-A-Post',function(){

    return view('Add-A-Post.index');
})->name('add-a-post');

Route::get('/Categories',function(){

    return view('Categories.index');
})->name('categories');

//Auth Protected Routes 

// Route::middleware(['auth'])->group(function () {
    

//     Route::get('/User-Profile', function () {
//     return view('User-Profile.index');
// })->name('user-profile');

    
// });





Route::get('/auth/google', function () {
    return Socialite::driver('google')->stateless()
        ->redirectUrl(url('/auth/google/callback'))
        ->redirect();
})->name('google.auth');

Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->stateless()
        ->redirectUrl(url('/auth/google/callback'))
        ->user();

    $user = User::where('email', $googleUser->getEmail())->first();

     if ($user) {
    // If user exists but didn't sign up with Google
    if (!$user->is_google_user) {
        return redirect()->route('login')->with('error', 'Email Already In Use');
    }

    Auth::login($user);
    request()->session()->regenerate();
    return redirect('/');
}

    $newUser = User::create([
        'id'        => Str::random(9),
        'name'      => $googleUser->getName(),
        'email'     => $googleUser->getEmail(),
        'profile_image'    => $googleUser->getAvatar(),
        'password'  => null,
        'is_google_user' => true,
    ]);

    Auth::login($newUser);
    request()->session()->regenerate();
    // Mail::to($newUser->email)->send(new WelcomeMail($newUser));
    return redirect('/A91kfZpXrL38sTYvq2nJ');
});

// FACEBOOK
Route::get('/auth/facebook', function () {
    return Socialite::driver('facebook')->redirect();
});

Route::get('/auth/facebook/callback', function () {
    $fbUser = Socialite::driver('facebook')->stateless()->user();

    $user = User::firstOrCreate(
        ['email' => $fbUser->getEmail()],
        ['name' => $fbUser->getName()]
    );

    Auth::login($user);
    return redirect('');
});


// custom Registeration & Login Auth

use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register'])->name('register.custom');

Route::post('/login', [AuthController::class, 'login'])->name('login.custom');

//upload-profile-pic
Route::post('/profile/image-upload', [App\Http\Controllers\ProfileController::class, 'upload'])->name('profile.image.upload');

//add a post
Route::post('/add-post', [App\Http\Controllers\PostController::class, 'store'])->name('add.post');

//get posts 

Route::get('/Posts', [PostController::class, 'index'])->name('posts');

//post Route 
Route::get('/post/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');

//home posts
Route::get('/', [PostController::class, 'homeArticles'])->name('home');


//search route
Route::get('/search', [SearchController::class, 'search'])->name('search');

//delete route
Route::delete('/posts/{id}/delete', [PostController::class, 'delete'])->name('posts.delete');

//user-posts route

Route::get('/User-Profile', [PostController::class, 'userPosts'])->middleware('auth')->name('user-profile');

//category route
Route::get('/Posts/category/{category}', [PostController::class, 'filterByCategory'])->name('posts.byCategory');

//more posts route

Route::get('/Post/related/{category}', [PostController::class, 'morePosts'])->name('posts.related');















//logout
Route::get('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
     return redirect()->route('login')->with('success', 'You have been logged out.');
})->name('logout');

