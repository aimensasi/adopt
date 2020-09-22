<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Child;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(Child::class, function (Faker $faker) {
	return [
		'name' => $faker->name,
		'bio' => $faker->paragraph(5),
		'age' => Arr::random([3, 5, 7, 10]),
		'nationality' => Arr::random(['Malaysian', 'Australian', 'Bangladeshi', 'Canadian', 'Chinese']),
		'gender' => Arr::random(['Male', 'Female'])
	];
});
