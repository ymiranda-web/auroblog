<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use DavidBadura\FakerMarkdownGenerator\FakerProvider;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $faker->addProvider(new FakerProvider($faker));
    return [
        'title' => $faker->sentence,
        'content_md' => $faker->markdown(3000),
    ];
});
