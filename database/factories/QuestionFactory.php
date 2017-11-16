<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Question::class, 'radio-mcq', function (Faker $faker) {
    return [
        'type' => 'radio',
        'prompt' => $faker->sentence(10, true) . '?',
        'weight' => $faker->numberBetween(1, 5),
        'shuffle' => $faker->boolean,
        'opt' => [
            $faker->name => 0,
            $faker->name => 0,
            $faker->name => 0,
            $faker->name => 1
        ]
    ];
});

$factory->define(App\Question::class, 'tick-mcq', function (Faker $faker) {
    return [
        'type' => 'tick',
        'prompt' => $faker->sentence(10, true) . '?',
        'weight' => $faker->numberBetween(1, 5),
        'shuffle' => $faker->boolean,
        'scoring' => $faker->randomElement(['any', 'all']),
        'opt' => [
            $faker->word => $faker->boolean,
            $faker->word => $faker->boolean,
            $faker->word => $faker->boolean,
            $faker->word => $faker->boolean
        ]
    ];
});

$factory->define(App\Question::class, 'radio-survey', function (Faker $faker) {
    return [
        'type' => 'radio',
        'prompt' => $faker->sentence(10, true) . '?',
        'weight' => 0,
        'shuffle' => $faker->boolean,
        'opt' => [
            $faker->word => 0,
            $faker->word => 0,
            $faker->word => 0,
            $faker->word => 0
        ]
    ];
});

$factory->define(App\Question::class, 'context', function (Faker $faker) {
    return [
        'type' => 'context',
        'text' => $faker->sentence
    ];
});

$factory->define(App\Question::class, 'text', function (Faker $faker) {
    return [
        'type' => 'text',
        'prompt' => $faker->sentence,
        'weight' => $faker->numberBetween(1, 5)
    ];
});
