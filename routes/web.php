<?php

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Main\IndexController as MainIndexController;
use App\Http\Controllers\Admin\Post\PostController as AdminPostController;
use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Comment\CommentController as CommentCommentController;
use App\Http\Controllers\Like\LikeController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Personal\Comment\CommentController;
use App\Http\Controllers\Personal\Liked\LikedController;
use App\Http\Controllers\Personal\Main\IndexController as PersonalMainIndexController;
use App\Http\Controllers\Personal\Post\PostController as PersonalPostController;
use App\Http\Controllers\Post\PostController as MainPostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', IndexController::class)->name('main.index');

Route::resource('/post', MainPostController::class)->only(['index', 'show']);
Route::resource('post.comment', CommentCommentController::class)->only(['store']);
Route::post('/post/{post}/like', LikeController::class)->name('post.like.store');

Route::group(['prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', PersonalMainIndexController::class)->name('personal.main.index');
    Route::get('/liked', [LikedController::class, 'index'])->name('personal.liked.index');
    Route::delete('/liked/{post}', [LikedController::class, 'destroy'])->name('personal.liked.destroy');

    Route::resource('post', PersonalPostController::class)->names('personal.post');

    Route::resource('/comment', CommentController::class)->except(['show', 'create', 'store'])->names('personal.comment');

});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified', 'admin']], function () {
    Route::get('/', MainIndexController::class)->name('admin.main.index');

    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
    Route::resource('post', AdminPostController::class)->names('admin.post');
    Route::resource('user', UserController::class);
});

Auth::routes(['verify' => true]);

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
