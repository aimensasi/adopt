<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model {

	public const PENDING = 'Pending';
	public const ACEEPTED = 'Accepted';


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'adopter_id', 'adoptee_id', 'status'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [];

	public function adopter() {
		return $this->belongsTo(User::class, 'adopter_id');
	}

	public function adoptee() {
		return $this->belongsTo(User::class, 'adoptee_id');
	}

	public function scopeWhereUserExists($query) {
		return $query->has('adoptee')->has('adopter');
	}
}
