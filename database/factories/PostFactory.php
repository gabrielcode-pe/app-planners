<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {

    $postTitle = $faker->sentence;
    return [
        'title' => $postTitle,
        'slug' =>  Str::slug($postTitle),
        'summary' => $faker->paragraph(2),
        'body' => $faker->text,
        'status' => 1,
        'url_portrait' => 'default-image.jpg',
        'post_source' => 'Escuela de proyectistas',
        'category_id' => factory(Category::class)
    ];
});
