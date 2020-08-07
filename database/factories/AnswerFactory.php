<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'question_id' =>$faker->numberBetween($min = 1, $max = 30),
        'answer' => $faker->sentence($nbWords = 10, $variableNbWords = true),
    ];
});
