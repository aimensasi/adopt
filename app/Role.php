<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use App\Exceptions\InvalidRequestException;

class Role extends Model {


	public const ADMIN = 'Admin';
	public const ADOPTER = 'Adopter';
	public const ADOPTEE = 'Adoptee';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
	];


	public function users() {
		return $this->hasMany(User::class);
	}


	public static function make($role) {
		return self::firstOrCreate(['name' => $role]);
	}
}
