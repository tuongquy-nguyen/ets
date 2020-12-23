<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Faculty;
use Faker\Generator as Faker;

$factory->define(Faculty::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'parent_id' => 3,
    ];
});
