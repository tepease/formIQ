<?php

use App\Form;
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
        $faker = Faker::create();

        $formIds = Form::pluck('id')->all();

        foreach(range(1, 50) as $i)
        {
            Question::create([
                'form_id' => $faker->randomElement($formIds),
                'updated_by' => 0,
                'content' => json_encode([
                    $faker->word => $faker->word
                ])
            ]);
        }
    }
}
