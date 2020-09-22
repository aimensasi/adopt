<?php

use App\Child;
use Illuminate\Database\Seeder;

class ChildSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Child::truncate();

		factory(Child::class, 10)->create();
	}
}
