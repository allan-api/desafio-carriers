<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Funcionario;
use Faker\Generator as Faker;


$factory->define(Funcionario::class, function (Faker $faker) {
    
    return [
        'nome'      => $faker->firstName,
        'sobrenome' => $faker->lastName,
        'idade'     => $faker->randomFloat(0, 18, 70),
        'sexo'      => $faker->randomElement(['masculino', 'femino']),
    ];
});


