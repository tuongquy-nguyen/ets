<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'student_no' => 'K12C04' . random_bytes(3),
        'dob' => $faker->date,
        'gender' => random_int(1,3),
        'actclass_id' => random_int(1, $actclass),
        'user_id' => random_int(1, $user),
        'profile' => $faker->imageUrl($width = 600, $height = 800),
        'birthplace' => $faker->sentence(),
        'nationality' => $faker->word(),
    ];
});
