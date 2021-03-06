<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Project;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UsersTableSeeder::class);
        User::create(
            [

                'name'     => 'Titi',
                'email'    => 'titi@gmail.com',
                'password' => '',
                'project_id'     => 2,
            ]
        );

        Project::create(

            [
            'ProjectTitle'=>"Mon deuxième super projet",
                'Descriptive'=>"L’objectif est de remplir la base de données avec un Seeder.",
            ]
        );

    }
}
