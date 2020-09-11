<?php

namespace App\Http\Controllers\Auth;

use App\AdopteeBio;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Providers\RouteServiceProvider;
use App\Role;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
	/*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = RouteServiceProvider::HOME;


	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\View\View
	 */
	public function showRegistrationForm(Request $request) {
		return view('auth.register', [
			'target' => $request->target
		]);
	}

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return Validator::make($data, [
			'target' => ['required'],
			'name' => ['required', 'string'],
			'phone_number' => ['required', 'string', 'unique:users'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\User
	 */
	protected function create(array $data) {
		if ($data['target'] == 1) {
			$role = Role::make(Role::ADOPTEE);
		} else {
			$role = Role::make(Role::ADOPTER);
		}

		$user = User::create([
			'email' => $data['email'],
			'name' => $data['name'],
			'phone_number' => $data['phone_number'],
			'password' => Hash::make($data['password']),
			'role_id' => $role->id,
		]);

		if ($user->hasRole(Role::ADOPTER)) {
			$profile = new Profile();
			$profile->user_id = $user->id;

			$user->profile()->save($profile);
		} else {
			$bio = new AdopteeBio();
			$bio->user_id = $user->id;

			$user->bio()->save($bio);
		}

		return $user;
	}
}
