<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Task::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'complete'=>false
    ];
});
