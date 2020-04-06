<?php

namespace Tests\Browser;

use App\User;
use App\Post;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * @group login
     */
    public function testAUserCanLogin()
    {
        $user = factory(User::class)->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->press('Login')
                ->assertPAthIs('/home');
        });
    }
    /**
     * @group posts-page
     */

    public function testAUserCanViewAPost()
    {
        $post = factory(Post::class)->create();

        $this->browser(function (Browser $browser) use ($post) {
            $browser->visit('/posts')
                ->clickLink('View Post Details')
                ->assertPathIs("/Post/{$post->id}")
                ->assertSee($post->title)
                ->assertSee($post->body)
                ->assertSee($post->createdAt());
        });
    }
}
