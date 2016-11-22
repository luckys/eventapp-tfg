<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use EventApp\Domain\Models\User;
use EventApp\Domain\Models\Event;
use EventApp\Domain\Models\Talk;

$factory->define(EventApp\Domain\Models\User::class, function (Faker\Generator $faker) {

    return [
        'email' => $faker->companyEmail,
        'password' => 'password',
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'company' => $faker->company,
        'job' => $faker->jobTitle,
        'biography' => $faker->paragraph,
        'url_github' => 'https://github.com/user1',
        'url_twitter' => 'https://twitter.com/user1',
        'photo' => 'default.jpg',
    ];
});

$factory->define(EventApp\Domain\Models\Event::class, function (Faker\Generator $faker) {

    $initial_capacity = $faker->numberBetween(1, 100);

    return [
        'author_id' => $faker->uuid,
        'name' => $faker->sentence,
        'description' => $faker->sentence,
        'start_date' => \Carbon\Carbon::now(),
        'end_date' => \Carbon\Carbon::now()->addDays(rand(1, 10)),
        'address' => $faker->address,
        'capacity' => $initial_capacity,
        'total_tickets' => $faker->numberBetween(0, $initial_capacity),
        'price' => $faker->randomFloat(2, 0, 500),
        'image' => 'events.jpg',
    ];
});

$factory->define(EventApp\Domain\Models\Talk::class, function (Faker\Generator $faker) {

    $initial_capacity = $faker->numberBetween(1, 100);
    $type = ['Seminario', 'Taller', 'Conferencia'];
    $level = ['Principiante', 'Intermedio', 'Avanzado'];

    return [
        'speaker_id' => User::all()->random()->id,
        'title' => $faker->sentence,
        'description' => $faker->sentence,
        'type' => $type[mt_rand(0, 2)],
        'level' => $level[mt_rand(0, 2)],
        'start_date' => \Carbon\Carbon::now()->addDays(rand(1, 10)),
        'length' => $faker->numberBetween(10, 90),
        'address' => $faker->address,
        'capacity' => $initial_capacity,
        'total_tickets' => $faker->numberBetween(0, $initial_capacity),
        'price' => $faker->randomFloat(2, 0, 500),
        'image' => 'talk1.jpg',
    ];
});
