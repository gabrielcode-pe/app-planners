<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Testimony;
use Faker\Generator as Faker;

$factory->define(Testimony::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence,
        'info_detail' => $faker->paragraph,
        'jobtitle' => $faker->jobTitle,
        'company' => $faker->company,
        'url_img' => 'default-user.jpg'
    ];
});
