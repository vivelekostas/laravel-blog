<?php

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Main\IndexController as MainIndexController;
use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Main\IndexController;
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

Route::get('/', IndexController::class);

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', MainIndexController::class);

    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
});

Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
