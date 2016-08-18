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

$factory->define(User::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'email' => 'user@demo.com',
        'password' => bcrypt('secret'),
        'firstname' => $faker->name,
        'lastname' => $faker->lastName,
        'company' => $faker->company,
        'biography' => $faker->sentence,
        'url_github' => 'http://github.com/user',
        'url_twitter' => 'http://twitter.com/user',
        'photo' => 'imagen.jpg',
        'remember_token' => str_random(10),
    ];
});
