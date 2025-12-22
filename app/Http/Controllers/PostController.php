<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class PostController extends Controller
{
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'post_image' => 'required|image|max:10240',
    //         'title' => 'required|string|max:255',
    //         'subtitle' => 'required|string|max:255',
    //         'body' => 'required|string',
    //         'category' => 'required|string'
    //     ]);

    //     $user = Auth::user();
    //     if (!$user) {
    //         return redirect()->back()->with('error', 'You must be logged in to post.');
    //     }

    //     $imagePath = $request->file('post_image')->store('post_images', 'public');

    //     $post = [
    //         'id' => Str::random(10),
    //         'image_path' => 'storage/' . $imagePath,
    //         'title' => $request->title,
    //         'subtitle' => $request->subtitle,
    //         'body' => $request->body,
    //         'category' => $request->category,
    //         'timestamp' => now()->toDateTimeString(),
    //         'author' => $user->name
    //     ];

    //     $file = storage_path('app/posts.json');
    //     $posts = [];

    //     if (File::exists($file)) {
    //         $json = File::get($file);
    //         $posts = json_decode($json, true) ?? [];
    //     }

    //     $posts[] = $post;
    //     File::put($file, json_encode($posts, JSON_PRETTY_PRINT));

    //     return redirect()->route('home')->with('success', 'Post created successfully!');
    // }

    public function store(Request $request)
{
   
    $request->validate([
        'post_image' => 'required|image|max:10240', // max 10MB
        'title' => 'required|string|max:255',
        'subtitle' => 'required|string|max:255',
        'body' => 'required|string',
        'category' => 'required|string'
    ]);

    $user = Auth::user();
    if (!$user) {
        return redirect()->back()->with('error', 'You must be logged in to post.');
    }

    $image = $request->file('post_image');

    // Check image dimensions
    [$width, $height] = getimagesize($image);

    if ($width < 1000 || $height < 1000) {
        return redirect()->back()->with('error', 'Image dimensions must be at least 1000x1000 pixels.');
    }

    if ($width > 5000 || $height > 5000) {
        return redirect()->back()->with('error', 'Image dimensions must not exceed 5000x5000 pixels.');
    }

    // Store the image
    $imagePath = $image->store('post_images', 'public');

    $post = [
        'id' => Str::random(10),
        'image_path' => 'storage/' . $imagePath,
        'title' => $request->title,
        'subtitle' => $request->subtitle,
        'body' => $request->body,
        'category' => $request->category,
        'timestamp' => now()->toDateTimeString(),
        'author' => $user->name
    ];

    $file = storage_path('app/posts.json');
    $posts = [];

    if (File::exists($file)) {
        $json = File::get($file);
        $posts = json_decode($json, true) ?? [];
    }

    $posts[] = $post;
    File::put($file, json_encode($posts, JSON_PRETTY_PRINT));

    return redirect()->route('home')->with('success', 'Post created successfully!');
}


    public function index()
    {
        $file = storage_path('app/posts.json');

        if (!file_exists($file)) {
            $posts = [];
        } else {
            $posts = json_decode(file_get_contents($file), true) ?? [];
        }

        usort($posts, function ($a, $b) {
        return strtotime($b['timestamp']) <=> strtotime($a['timestamp']);
    });

        return view('posts.index', compact('posts'));
    }

//show post

//     public function show($id)
// {
//     $file = storage_path('app/posts.json');

//     if (!file_exists($file)) {
//         abort(404);
//     }

//     $posts = json_decode(file_get_contents($file), true);

//     $post = collect($posts)->firstWhere('id', $id);

//     if (!$post) {
//         abort(404);
//     }

//     return view('post.show', compact('post'));
// }

public function show($id)
{
    $file = storage_path('app/posts.json');

    if (!file_exists($file)) {
        abort(404);
    }

    $allPosts = json_decode(file_get_contents($file), true);

    $post = collect($allPosts)->firstWhere('id', $id);

    if (!$post) {
        abort(404);
    }

    // Get related posts from same category (excluding current post)
    $relatedPosts = collect($allPosts)
        ->where('category', $post['category'])
        ->where('id', '!=', $id)
        ->sortByDesc('timestamp')
        ->take(6)
        ->values()
        ->all();

    return view('post.show', compact('post', 'relatedPosts'));
}

public function homeArticles()
{
    $file = storage_path('app/posts.json');

    if (!file_exists($file)) {
        $posts = [];
    } else {
        $posts = json_decode(file_get_contents($file), true);
    }

    // Sort by latest timestamp
    usort($posts, function ($a, $b) {
        return strtotime($b['timestamp']) <=> strtotime($a['timestamp']);
    });

    
    foreach ($posts as $index => &$post) {
        $post['layout'] = ($index % 5 == 0) ? 'large' : 'small';
    }

    return view('index', compact('posts'));
}

//delete post

public function delete($id)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->back()->with('error', 'You must be logged in to delete a post.');
    }

    $file = storage_path('app/posts.json');

    if (!file_exists($file)) {
        return redirect()->back()->with('error', 'No posts found.');
    }

    $posts = json_decode(file_get_contents($file), true);

    $filteredPosts = array_filter($posts, function ($post) use ($id, $user) {
        return !($post['id'] === $id && $post['author'] === $user->name);
    });

    // Only write to file if something was actually removed
    if (count($posts) !== count($filteredPosts)) {
        file_put_contents($file, json_encode(array_values($filteredPosts), JSON_PRETTY_PRINT));
        return back()->with('success', 'Post deleted successfully.');
    } else {
        return back()->with('error', 'You can only delete your own posts.');
    }
}

//user posts

public function userPosts()
{
    $user = Auth::user();

    $file = storage_path('app/posts.json');
    $posts = [];

    if (file_exists($file)) {
        $allPosts = json_decode(file_get_contents($file), true);

        if (is_array($allPosts)) {
            $posts = collect($allPosts)->where('author', $user->name)->values()->all();
        }
    }

    return view('User-Profile.index', ['posts' => $posts]);
}

//category posts

public function filterByCategory($category)
{
    $file = storage_path('app/posts.json');
    $posts = [];

    if (file_exists($file)) {
        $allPosts = json_decode(file_get_contents($file), true);
        $posts = collect($allPosts)
            ->where('category', $category)
            ->sortByDesc('timestamp')
            ->values()
            ->all();
    }

    return view('posts.index', compact('posts', 'category'));
}

//related posts

public function morePosts($category)
{
    $file = storage_path('app/posts.json');
    $posts = [];

    if (file_exists($file)) {
        $allPosts = json_decode(file_get_contents($file), true);
        $posts = collect($allPosts)
            ->where('category', $category)
            ->sortByDesc('timestamp')
            ->values()
            ->all();
    }

    return view('partials.more-posts', compact('posts', 'category'));
}










}
