<?php

use App\Form;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 10) as $i)
        {
            Form::create([
                'anonymous' => $faker->boolean()
            ]);
        }
    }
}
