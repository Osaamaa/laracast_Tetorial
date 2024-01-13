<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use function Symfony\Component\String\s;

class PostController extends Controller
{
    public function index()
    {
//        return  Post::latest()->filter(request(['search','category','author']))->paginate(1);
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search','category','author']))->paginate(3)->withQueryString(),

        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'categories' => Category::all(),

        ]);
    }
    public function storeComment(){

    }

}
