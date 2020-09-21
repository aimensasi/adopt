<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdoptersController extends Controller {


	public function index() {
		$adopters = User::adopters()->get();

		return view('admin.adopters.index', compact('adopters'));
	}

	public function expectingMothers() {
		$adoptees = User::adoptee()->get();

		return view('admin.adoptee.index', compact('adoptees'));
	}


	public function show(User $adopter) {

		if ($adopter->hasRole(Role::ADOPTEE)) {
			return abort(403);
		}

		return view('adopters.show', compact('adopter'));
	}
}
