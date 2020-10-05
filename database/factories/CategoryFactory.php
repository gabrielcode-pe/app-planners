<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {

    $catName = $faker->sentence(3, true);

    return [
        'name' => $catName,
        'url_portrait' => 'default-image.jpg',
        'slug' => Str::slug($catName)
    ];
});
