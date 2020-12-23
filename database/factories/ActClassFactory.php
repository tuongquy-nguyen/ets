<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ActClass;
use Faker\Generator as Faker;

$factory->define(ActClass::class, function (Faker $faker) {
    $faculty = count(DB::table('faculties')->select('id')->get());
    $teacher = count(DB::table('teachers')->select('id')->get());
    return [
        'name' => $faker->word(),
        'faculty_id' => random_int(1,$faculty),
        'teacher_id' => random_int(1,$teacher),
    ];
});
