<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Instructor;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Instructor::class, function (Faker $faker) {

    $name = $faker->sentence(2, true);
    return [
        'name' => $name,
        'slug' => Str::slug($name),
        'info' => $faker->text,
        'url_img' => 'default-user.jpg'
    ];
});
