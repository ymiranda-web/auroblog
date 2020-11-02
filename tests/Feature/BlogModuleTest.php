<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogModuleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @test
     */
    function is_shows_blog_in_ie_less_than_11()
    {
        $this->markTestIncomplete();
        $response = $this->withHeaders([
            'User-Agent' => 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2)'
        ])->get(route('blog.index'));;
        $response->assertRedirect('https://browsehappy.com');
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    function is_shows_blog_in_ie_11()
    {
        $this->markTestIncomplete();
        $response = $this->withHeaders([
            'User-Agent' => 'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko'
        ])->get(route('blog.index'));
        $response->assertRedirect('https://browsehappy.com');
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    function is_shows_blog_in_other_browser()
    {
        $response = $this->withHeaders([
            'user-agent' => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:82.0) Gecko/20100101 Firefox/82.0'
        ])->get(route('blog.index'));
        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    function is_shows_empty_blog()
    {
        $this->get(route('blog.index'))
            ->assertStatus(200)
            ->assertSee('Blog vacío');
    }
}
