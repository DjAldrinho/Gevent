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
        'nombres' => $faker->firstName,
        'apellidos' => $faker->lastName,
        'fecha_nacimiento' => $faker->date(),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'is_administrador' => false,
        'is_superadministrador' => false,
        'cargo' => $faker->jobTitle,
        'avatar' => 'usuario.png'
    ];
});
