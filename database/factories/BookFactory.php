<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use App\User;

use Faker\Generator as Faker;

/*
$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'cover_image_url' => 'test',
        'description' => $faker->text($maxNbChars = 200),
        'is_approved' => true,
        'user_id' => User::all()->random()->id,
        'price' => $faker->numberBetween(1, 100),
        'discount' => $faker->numberBetween(0, 100)
    ];
});
*/
