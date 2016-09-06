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
        'email' => 'speaker@demo.com',
        'password' => bcrypt('speaker'),
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
    ];
});

$factory->define(EventApp\Domain\Models\Event::class, function (Faker\Generator $faker) {

    return [
        'author_id' => User::first()->id,
        'name' => $faker->sentence,
        'description' => $faker->sentence,
        'start_date' => $faker->dateTimeThisMonth,
        'end_date' => $faker->dateTimeThisMonth,
        'address' => $faker->address,
        'capacity' => 200,
        'total_tickets' => 200,
        'price' => $faker->randomFloat(2, 0, 500),
        'image' => 'egege.jpg',
    ];
});

$factory->define(EventApp\Domain\Models\Talk::class, function (Faker\Generator $faker) {

    return [
        'speaker_id' => User::first()->id,
        'title' => $faker->sentence,
        'description' => $faker->sentence,
        'type' => 'Seminario',
        'level' => 'Intermedio',
        'start_date' => $faker->dateTimeThisMonth,
        'length' => $faker->numberBetween(10, 90),
        'address' => $faker->address,
        'capacity' => 1,
        'total_tickets' => 1,
        'price' => $faker->randomFloat(2, 0, 500),
        'image' => 'feqgegeg.jpg',
    ];
});
