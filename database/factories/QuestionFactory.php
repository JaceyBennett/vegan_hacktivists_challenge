<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(question::class, function (Faker $faker) {
    return [
        'question' => $faker->text($maxNbChars = 200) . '?',
    ];
});
