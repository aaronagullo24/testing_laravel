<?php

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use \App\Post;
class ViewAllBlogPostsTest extends TestCase
{
    use DatabaseMigrations;
    
    public function testCanViewAllBlogPosts()
    {
        /*
        $post1 = factory(Post::class)->create();
        $post2 = factory(Post::class)->create();
        $resp = $this->get('/posts');
        $resp->assertStatus(200);
        $resp->assertSee($post1->title);
        $resp->assertSee($post2->title);
        $resp->assertSee(str_limit($post1->body));
        $resp->assertSee(str_limit($post2->body));
        */
    }
}
