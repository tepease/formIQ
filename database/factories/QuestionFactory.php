<?php

use App\Form;
use App\Question;
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

$factory->defineAs(Question::class, 'radio-mcq', function (Faker $faker) {
    $max = $faker->numberBetween(2, 6);
    $opt = [];

    foreach (range(0, $max) as $i) {
        $opt[$faker->word] = 0;
    }

    $opt[$faker->numberBetween(0, $max)] = 1;

    return [
        'form_id' => $faker->randomElement(Form::pluck('id')->all()),
        'sequence' => 0,
        'updated_by' => 0,
        'type' => 'radio',
        'attr' => json_encode([
            'prompt' => $faker->sentence(10, true) . '?',
            'weight' => $faker->numberBetween(1, 5),
            'shuffle' => $faker->boolean,
            'opt' => $opt
        ])
    ];
});

$factory->defineAs(Question::class, 'tick-mcq', function (Faker $faker) {
    $opt = [];
    foreach (range(0, $faker->numberBetween(2, 6)) as $i) {
        $opt[$faker->word] = $faker->boolean;
    }

    return [
        'form_id' => $faker->randomElement(Form::pluck('id')->all()),
        'sequence' => 0,
        'updated_by' => 0,
        'type' => 'tick',
        'attr' => json_encode([
            'prompt' => $faker->sentence(10, true) . '?',
            'weight' => $faker->numberBetween(1, 5),
            'shuffle' => $faker->boolean,
            'scoring' => $faker->randomElement(['any', 'all']),
            'opt' => $opt
        ])
    ];
});

$factory->defineAs(Question::class, 'radio-survey', function (Faker $faker) {
    $opt = [];
    foreach (range(0, $faker->numberBetween(2, 6)) as $i) {
        $opt[$faker->word] = 0;
    }

    return [
        'form_id' => $faker->randomElement(Form::pluck('id')->all()),
        'sequence' => 0,
        'updated_by' => 0,
        'type' => 'radio',
        'attr' => json_encode([
            'prompt' => $faker->sentence(10, true) . '?',
            'weight' => 0,
            'shuffle' => $faker->boolean,
            'opt' => $opt
        ])
    ];
});

$factory->defineAs(Question::class, 'context', function (Faker $faker) {
    return [
        'form_id' => $faker->randomElement(Form::pluck('id')->all()),
        'sequence' => 0,
        'updated_by' => 0,
        'type' => 'context',
        'attr' => json_encode([
            'text' => $faker->sentence
        ])
    ];
});

$factory->defineAs(Question::class, 'text', function (Faker $faker) {
    return [
        'form_id' => $faker->randomElement(Form::pluck('id')->all()),
        'sequence' => 0,
        'updated_by' => 0,
        'type' => 'text',
        'attr' => json_encode([
            'prompt' => $faker->sentence,
            'weight' => $faker->numberBetween(1, 5)
        ])
    ];
});
