<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Institution;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Institution::class, function (Faker $faker) {

    $name = $faker->sentence(2, true);
    return [
        'name' => $name,
        'info' => 'lorem lorem lorem',
        'phone' => '9898838',
        'email' => $faker->email,
        'slug' => Str::slug($name),
        'url_logo' => 'logo-test.jpg',
        'url_web' => $faker->url
    ];
});
