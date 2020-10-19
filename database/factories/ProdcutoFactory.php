<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\shop\Producto;
use Faker\Generator as Faker;

$factory->define(Producto::class, function (Faker $faker) {
    return [
        'nombre'  => $faker->sentence(2),
        'descripcion' => $faker->paragraph,
        'precio' => $faker->numberBetween(10,200)
    ];
});
