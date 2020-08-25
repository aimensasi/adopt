<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('profiles', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id');
			$table->longText('why_adoption')->nullable();
			$table->longText('about_us')->nullable();
			$table->longText('our_home')->nullable();
			$table->boolean('published')->default(false);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('profiles');
	}
}
