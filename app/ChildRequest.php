<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildRequest extends Model {


	public function child() {
		return $this->belongsTo(Child::class);
	}

	public function adopter() {
		return $this->belongsTo(User::class, 'adopter_id');
	}

	public function scopeHasRequestFromAdopter($query) {
		return $query->where('adopter_id', auth()->user()->id)->first() != null;
	}

	public function scopeRequestStatus($query) {
		$request = $query->where('adopter_id', auth()->user()->id)->first();


		return optional($request)->status;
	}
}
