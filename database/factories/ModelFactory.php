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
$factory->define(App\Usuario::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'nombres' => $faker->name,
        'apellidos' => $faker->lastName,
        'rol' => $faker->randomElement($array = ['administrador', 'empleado']),
        'identificacion' => $faker->randomNumber($nbDigits = NULL),
        'genero' => $faker->boolean($chanceOfGettingTrue = 50),
        'area' => $faker->numerify('Area ##'),
        'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
