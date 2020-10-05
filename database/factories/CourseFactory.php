<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use App\Institution;
use App\Instructor;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Course::class, function (Faker $faker) {
    $name = $faker->sentence;
    return [
        'name' => $name,
        'slug' => Str::slug($name),
        'seo' => $faker->sentence,
        'info' => $faker->paragraph(2),
        'is_free' => $faker->randomElement([1,0]),
        'url_portrait' => 'default-image.jpg',
        'institution_id' => factory(Institution::class),
        'instructor_id' => factory(Instructor::class),

    ];
});
