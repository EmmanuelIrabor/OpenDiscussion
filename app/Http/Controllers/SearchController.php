<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $file = storage_path('app/posts.json');
        $posts = [];

        if (file_exists($file)) {
            $posts = json_decode(file_get_contents($file), true);
        }

        // Filter posts (case-insensitive search)
        $filtered = array_filter($posts, function ($post) use ($query) {
            return Str::contains(Str::lower($post['title']), Str::lower($query)) ||
                //    Str::contains(Str::lower($post['subtitle']), Str::lower($query)) ||
                   Str::contains(Str::lower($post['category']), Str::lower($query));
        });

        return view('posts.index', ['posts' => $filtered, 'searchQuery' => $query]);
    }
}

