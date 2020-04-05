<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Post;

class PostsController extends Controller
{
    public function index($id){
        return view('post')->withPost(Post::find($id));
    }
}
