<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('post.index', [
            'posts' => Post::paginate(6),
            'categories' => Category::all(),
            'randomPosts' => Post::get()->random(4),
            'likedPosts' => Post::withCount('likedUsers')
                ->orderBy('liked_users_count', 'DESC')
                ->get()
                ->take(4),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', [
            'post' => $post,
            'date' => Carbon::parse($post->created_at),
            'relatedPosts' => Post::where('category_id', $post->category_id)
                ->where('id', '!=', $post->id)
                ->get()
                ->take(3),
        ]);
    }
}
