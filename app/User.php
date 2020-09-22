<?php

namespace App;

use App\Exceptions\InvalidRequestException;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'email', 'password', 'role_id', 'name', 'phone_number'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function role() {
		return $this->belongsTo(Role::class);
	}


	public function hasRole($role) {
		return $this->role->name == $role;
	}


	public function assignRole($role) {

		if (is_string($role)) {
			$role = Role::where('role', $role)->first();
		}

		if (!$role) {
			throw new InvalidRequestException('Invalid Role');
		}

		$this->role_id = $role->id;
		$this->save();
	}

	public function profile() {
		return $this->hasOne(Profile::class);
	}

	public function bio() {
		return $this->hasOne(AdopteeBio::class);
	}

	public function profileUpdate() {
		return $this->profile->touched();
	}

	public function profilePublished() {
		return $this->profile->published;
	}

	public function MarkAsPaid() {
		$profile = $this->profile;
		$profile->published = true;
		$profile->save();
	}

	public function scopeAdopters($query) {
		$adopter = Role::firstWhere('name', Role::ADOPTER);

		return $query->whereHas('profile', function ($query) {
			$query->where('published', true);
		})->where('role_id', $adopter->id);
	}

	public function scopeAdoptee($query) {
		$adoptee = Role::firstWhere('name', Role::ADOPTEE);

		return $query->has('bio')->where('role_id', $adoptee->id);
	}

	public function profileImage() {
		$photo = optional(optional($this->profile->photos)->first())->url;

		return $photo;
	}

	/**
	 * The "booted" method of the model.
	 *
	 * @return void
	 */
	protected static function booted() {
		static::created(function ($user) {
			// if ($user->hasRole(Role::ADOPTER)) {
			// 	$profile = new Profile;
			// 	$profile->user_id = $user->id;

			// 	$user->profile()->save($profile);
			// }
		});

		static::deleting(function ($user) {
			if ($user->profile) {
				$user->profile->delete();
			}
			if ($user->bio) {
				$user->bio->delete();
			}
		});
	}


	public function meetingRequests() {
		return $this->hasMany(Meeting::class, 'adopter_id');
	}

	public function sentRequests() {
		return $this->hasMany(Meeting::class, 'adoptee_id');
	}


	public function meetingStatusFor(User $user) {
		$meeting = $this->sentRequests()->firstWhere('adopter_id', $user->id);

		return optional($meeting)->status;
	}

	public function children() {
		return $this->hasMany(ChildRequest::class, 'adopter_id');
	}
}
