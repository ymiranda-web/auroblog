<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminBlogModuleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @test
     */
    function it_shows_the_dashboard_page_to_authenticated_users()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->get(route('posts.index'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    function it_redirects_guest_users_to_the_login_page()
    {
        $this->get(route('posts.index'))
            ->assertStatus(302)
            ->assertRedirect('login');
    }
}
