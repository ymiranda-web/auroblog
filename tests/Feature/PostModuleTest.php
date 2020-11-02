<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostModuleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function validate_integrity_of_markdown()
    {
        $post = factory(Post::class)->create([
            'content_md' => "# Un titulo \n un parrafo"
        ]);

        $this->get(route('blog.show', $post->slug))
            ->assertStatus(200)
            ->assertSee("<h1>Un titulo</h1>\n<p>un parrafo</p>", true);
    }
}
