<?php

namespace Tests\Unit;

use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic unit test example.
     *
     * @test
     */
    function create_post_and_saved_in_database()
    {
        $data = [
            'title' => 'Titulo del post',
            'content_md' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit."
        ];
        factory(Post::class)->create($data);
        $this->assertDatabaseHas('posts', $data);
    }

    /**
     * @test
     */
    function save_markdown_post(){
        $data = [
            'title' => 'Titulo del post',
            'content_md' => "# Lorem ipsum dolor sit amet, consectetur adipiscing elit"
        ];
        $expected_html = "<h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h1>\n";
        factory(Post::class)->create($data);
        $this->assertDatabaseHas('posts', [
            'content' => $expected_html
        ]);
    }
}
