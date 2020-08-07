<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'question' => str_replace('.', "?", $faker->sentence($nbWords = 10, $variableNbWords = true)), // creates a random Lorem sentence and replaces the period with a question mark
    ];
});
