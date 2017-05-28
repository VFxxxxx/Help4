<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use App\User;
use App\NeedCategory;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'skills' => $faker->text($maxNbChars = 200),
      	'rating' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 10),
      	'balance' => $faker->randomDigit,
      	'photo' => null,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Review::class, function (Faker\Generator $faker) {
    return [
        'text' => $faker->text($maxNbChars = 200),
      	'id_from' => $faker->randomElement(User::pluck('id')->toArray()),
    ];
});

$factory->define(App\NeedCategory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Need::class, function (Faker\Generator $faker) {
    return [
        'text' => $faker->text($maxNbChars = 200),
      	'id_from' => $faker->randomElement(User::pluck('id')->toArray()),
      	'category_id' => $faker->randomElement(NeedCategory::pluck('id')->toArray()),
      	'points' => $faker->randomDigitNotNull,
    ];
});

$factory->define(App\Message::class, function (Faker\Generator $faker) {
    return [
        'text' => $faker->text($maxNbChars = 200),
      	'id_from' => $faker->randomElement(User::pluck('id')->toArray()),
      	'id_to' => $faker->randomElement(User::pluck('id')->toArray()),
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'text' => $faker->text($maxNbChars = 200),
      	'id_from' => $faker->randomElement(User::pluck('id')->toArray()),
      	'id_to' => $faker->randomElement(User::pluck('id')->toArray()),
      	'rating' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 10),
    ];
});