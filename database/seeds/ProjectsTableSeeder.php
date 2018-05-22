<?php

use Illuminate\Database\Seeder;
use App\Project;
use App\Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $faker = Faker::create('App\Project');
//        Project::insert([
//            'ProjectTitle' => $faker->sentence,
//            'Descriptive' => $faker ->paragraphs
//        ]);

        Project::create(
//
            [
            'ProjectTitle'=>"Mon deuxième super projet",
                'Descriptive'=>"L’objectif est de remplir la base de données avec un Seeder.",
            ]
        );
    }
}
