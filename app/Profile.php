<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'why_adoption', 'about_us', 'our_home', 'published'
	];


	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'published' => 'bool',
	];


	public function photos() {
		return $this->hasMany(Album::class);
	}

	public function touched() {
		return $this->why_adoption != null || $this->about_us != null || $this->our_home != null;
	}
}
