<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreatePostsTest extends TestCase
{
    use DatabaseMigrations;
    public function testCanCreatePost()
    {

        $resp = $this->post('/store-post', [

            'title' => 'new post title',
            'body' => 'new post body',
        ]);
        $this->assertDatabaseHas('posts', [
            'title' => 'new post title',
            'body' => 'new post body',
        ]);

        $post = Post::find(1);

        $this->assertEquals('new post title', $post->title);
        $this->assertEquals('new post body', $post->body);
    }
    /**
     * @group body-req
     */

    public function testBodyIsRequiredToCreatePost()
    {
        $resp = $this->post('/store-post', [
            'title' => 'new post title',
            'body' => null
        ]);

        $resp->assertSessionHasErrors('body');
    }
}
