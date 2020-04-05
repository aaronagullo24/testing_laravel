<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Post;

class PostsController extends Controller
{
    public function index($id)
    {
        try {
            $post = Post::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            
            abort(404,'page not found');
        }

        return view('post')->withPost($post);
    }
}
