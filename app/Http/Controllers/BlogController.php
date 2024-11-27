<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('blog.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id); 
        return view('blog.show', compact('post')); 
    }
    // public function show($id)
    // {
    //     $post = Post::findOrFail($id); // Retrieve the post by ID or fail with 404

    //     // Pass the post and meta information to the view
    //     return view('blog.show', [
    //         'post' => $post,
    //         'meta_title' => $post->meta_title,
    //         'meta_description' => $post->meta_description,
    //         'meta_keywords' => $post->meta_keyword,
    //     ]);
    // }

}
