<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [PostController::class,'index'])->name('home');
Route::get('/posts/{post:slug}',[PostController::class,'show']);
Route::get('categories/{category:slug}', function (\App\Models\Category $category) {//slug is an attribute in the database dont forget that
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all(),

    ]);
})->name('category');
Route::get('authors/{author:username}', function (User $author) {//slug is an attribute in the database dont forget that
    return view('posts', [
        'posts' => $author->posts
    ]);
});
