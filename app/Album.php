<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Album extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'profile_id', 'url', 'caption'
	];


	public function getUrlAttribute($value) {
		return $value ? Storage::url($value) : asset('images/image-placeholder.png');
	}
}
