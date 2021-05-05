<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => $faker->numberBetween(1000, 10000),
        'category_id' => $faker->numberBetween(1, 4),
        'qty' => $faker->numberBetween(1, 15),
    ];
});
