<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        return view('personal.main.index', [
            'userName' => $user->name,
            'postsCount' => $user->posts->count(),
            'likedPostsCount' => $user->likedPosts->count(),
            'commentsCount' => $user->comments->count(),
        ]);
    }
}
