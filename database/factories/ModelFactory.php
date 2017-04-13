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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'address' => $faker->address,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Client::class, function (Faker\Generator $faker) {
   return [
       'first_name' => $faker->firstName,
       'last_name' => $faker->lastName,
       'phone_number' => $faker->phoneNumber,
       'plot_number' => $faker->numberBetween(1,1000),
       'address' => $faker->address,
       'meter_number' => $faker->numberBetween(1,1000)
   ];
});

$factory->define(App\MeterReading::class, function (Faker\Generator $faker) {
   return [
       'read_date' => $faker->date(),
       'reading' => $faker->numberBetween(1,1000)
   ];
});
