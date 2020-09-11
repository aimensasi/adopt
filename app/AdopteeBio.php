<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdopteeBio extends Model {
	//


	public $casts = [
		'expecting_date' => 'datetime'
	];
}
