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

$factory->define(EventApp\Domain\Models\User::class, function (Faker\Generator $faker) {

    return [
        'email' => $faker->companyEmail,
        'password' => 'speaker',
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

    return [
        'author_id' => User::all()->random()->id,
        'name' => $faker->sentence,
        'description' => $faker->sentence,
        'start_date' => \Carbon\Carbon::now()->addDays(rand(1, 10)),
        'end_date' => \Carbon\Carbon::now()->addDays(rand(1, 10)),
        'address' => $faker->address,
        'capacity' => 50,
        'total_tickets' => 50,
        'price' => $faker->randomFloat(2, 0, 500),
        'image' => 'events.jpg',
    ];
});

$factory->define(EventApp\Domain\Models\Talk::class, function (Faker\Generator $faker) {

    return [
        'speaker_id' => User::all()->random()->id,
        'title' => $faker->sentence,
        'description' => $faker->sentence,
        'type' => 'Seminario',
        'level' => 'Intermedio',
        'start_date' => \Carbon\Carbon::now()->addDays(rand(1, 10)),
        'length' => $faker->numberBetween(10, 90),
        'address' => $faker->address,
        'capacity' => 1,
        'total_tickets' => 1,
        'price' => $faker->randomFloat(2, 0, 500),
        'image' => 'talk1.jpg',
    ];
});
