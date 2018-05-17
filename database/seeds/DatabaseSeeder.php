<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $faker = Faker::create('App\Project'):
        DB::table('projects')->insert([
            'title' => $faker->sentence,
            'content' => $faker ->paragraphs
        ])
    }
}
