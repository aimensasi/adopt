<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Child extends Model {


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'age', 'nationality', 'gender'
	];

	public function getPictureAttribute($value) {
		return Storage::exists($value) ? Storage::url($value) : "https://images.unsplash.com/photo-1503919545889-aef636e10ad4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80";
	}

	public function requests() {
		return $this->hasMany(ChildRequest::class);
	}
}
