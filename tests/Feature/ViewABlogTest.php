<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;

class ViewABlogTest extends TestCase
{

    use DatabaseMigrations;

    public function testCanViewABlogPost()
    {

        $post = Post::create([
            'title' => 'A simple title',
            'body' => 'A simple body',
        ]);

        $resp = $this->get("/post/{$post->id}");

        $resp->assertStatus(200);

        $resp->assertSee($post->title);

        $resp->assertSee($post->body);

        $resp->assertSee($post->created_at->toFormattedDateString());
    }
    /**
     * @group post-not-found
     * @return [Type] [description]
     */

    public function testViewA404PageWhenPostIsNotFound()
    {

        $resp = $this->get('post/INVALID_ID');

        $resp->assertStatus(404);

        $resp->assertSee("The page you are looking for could not be found");
    }
}
