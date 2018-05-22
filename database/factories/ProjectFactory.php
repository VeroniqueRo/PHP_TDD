<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) use ($factory) {
    return [
        'ProjectTitle' => $faker->catchPhrase(),
        'Descriptive' => $faker->sentence(),
        'user_id' => $factory->create(App\User::class)->id,
    ];
});