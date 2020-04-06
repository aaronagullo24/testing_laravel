<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreatePostTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * @group create-post
     */
    public function testAuthUserCanCreatePost()
    {
        $user = factory(User::class)->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->LoginAs($user)
                ->visit('/create-post')
                ->type('title', 'New post')
                ->type('body', 'New body')
                ->press('Save Post')
                ->assertPathIs('/posts')
                ->assertSee('New post')
                ->assertSee('New body');
        });
    }
}
