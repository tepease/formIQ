<?php

use App\Question;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'radio-mcq',
            'tick-mcq',
            'radio-survey',
            'context',
            'text'
        ];

        $faker = Faker::create();

        foreach(range(1, 50) as $i)
        {
            factory(Question::class, $faker->randomElement($types))->create();
        }
    }
}
