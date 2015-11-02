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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Feira::class, function (Faker\Generator $faker) {
    return [
        'tipo' => $faker->sentence,
        'local' => $faker->address,
        'data' => $faker->dateTime,
        'observacao' => $faker->sentence,
    ];
});

$factory->define(App\Usuario::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->email,
        'senha' => bcrypt(str_random(10)),
        'cpf' => str_random(10),
        'telefone' => $faker->phoneNumber,
        'turma' => str_random(5),
        'semestre' => str_random(12),
        'curso' => $faker->country,
        'nivel' => $faker->streetName,
    ];
});