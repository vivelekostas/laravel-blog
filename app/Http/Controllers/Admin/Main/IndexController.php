<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('admin.main.index', [
            'usersCount' => User::all()->count(),
            'postsCount' => Post::all()->count(),
            'categoriesCount' => Category::all()->count(),
            'tagsCount' => Tag::all()->count(),
        ]);
    }
}
