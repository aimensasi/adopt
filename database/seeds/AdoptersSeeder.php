<?php

use App\Profile;
use App\User;
use Illuminate\Database\Seeder;

class AdoptersSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		factory(User::class, 30)->state('adopter')->create()->each(function ($user) {
			$user->profile()->save(factory(Profile::class)->make());
		});

		factory(User::class, 30)->state('adoptee')->create()->each(function ($user) {
			$user->profile()->save(factory(Profile::class)->make());
		});
	}
}
