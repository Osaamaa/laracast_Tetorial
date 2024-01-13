<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function Symfony\Component\String\s;

class PostController extends Controller
{
    public function index()
    {
//        return  Post::latest()->filter(request(['search','category','author']))->paginate(1);
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(3)->withQueryString(),

        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'categories' => Category::all(),

        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {

        $attributes= \request()->validate([
            'title' => 'required',
            'thumbnail'=>'required|image',
            'slug' => ['required',Rule::unique('posts','slug')],
            'body' => 'required',
            'excerpt' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail']=\request()->file('thumbnail')->store('thumbnails');
        Post::create($attributes);
    }
}
