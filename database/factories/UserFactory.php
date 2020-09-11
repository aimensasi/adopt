<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AdopteeBio;
use App\Profile;
use App\Role;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
	return [
		'name' => $faker->name,
		'phone_number' => $faker->phoneNumber,
		'email' => $faker->unique()->safeEmail,
		'email_verified_at' => now(),
		'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
		'remember_token' => Str::random(10),
		'role_id' => Role::firstOrCreate(['name' => Role::ADOPTER]),
	];
});

$factory->state(User::class, 'adopter', function (Faker $faker) {
	return [
		'role_id' => Role::firstOrCreate(['name' => Role::ADOPTER]),
	];
});

$factory->state(User::class, 'adoptee', function (Faker $faker) {
	return [
		'role_id' => Role::firstOrCreate(['name' => Role::ADOPTEE]),
	];
});


$factory->define(Profile::class, function (Faker $faker) {
	return [
		'why_adoption' => $faker->paragraph(5),
		'about_us' => $faker->paragraph(5),
		'our_home' => $faker->paragraph(5),
		'published' => true,
		'user_id' => factory(User::class),
	];
});


$factory->define(AdopteeBio::class, function (Faker $faker) {
	return [
		'bio' => $faker->paragraph(5),
		'expecting_date' => now()->addMonths(3),
		'user_id' => factory(User::class),
	];
});


$factory->define(Role::class, function (Faker $faker) {
	return [
		'name' => Arr::random([Role::ADMIN, Role::ADOPTEE, Role::ADOPTER]),
	];
});


$factory->state(Role::class, 'adopter', function (Faker $faker) {
	return [
		'name' => Role::ADOPTER,
	];
});
