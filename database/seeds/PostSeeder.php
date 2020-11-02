<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class)->times(30)->create();
        sleep(1);
        factory(Post::class)->create([
            'content_md' => '```css
html {
  font-family: sans-serif;
  line-height: 1.15;
  -webkit-text-size-adjust: 100%;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
```'
        ]);
        sleep(1);
        factory(Post::class)->create([
            "content_md" => "```php
protected function getFacadeAccessor()
{
    return 'markdown';
}
```"
        ]);
        sleep(1);
        factory(Post::class)->create([
            "content_md" => "```js
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});
```"
        ]);

    }
}
