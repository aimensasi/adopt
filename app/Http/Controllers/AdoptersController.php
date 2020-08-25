<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdoptersController extends Controller {


	public function show(User $adopter) {

		return view('adopters.show', compact('adopter'));
	}
}
