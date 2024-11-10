<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class LikedController extends Controller
{
    public function index()
    {
        return view('personal.liked.index', [
            'posts' => auth()->user()->likedPosts
        ]);
    }

    public function destroy(Post $post)
    {
        auth()->user()->likedPosts()->detach($post->id);

        return redirect()->route('personal.liked.index');
    }
}
