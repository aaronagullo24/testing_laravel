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

            abort(404, 'page not found');
        }

        return view('post')->withPost($post);
    }

    public function showAllPosts()
    {
        return view('posts')->withPosts(Post::all());
    }

    public function storePost()
    {
        $r = request();
        $this->validate($r, [
            'title' => 'required',
            'body'=>'required'
        ]);
        $post = Post::create([
            'title' => request()->title,
            'body' => request()->body
        ]);
        return redirect('/posts');
    }

    public function createPost(){
        return view('create-post');
    }
}
