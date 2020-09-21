<?php

namespace App\Http\Controllers;

use App\Meeting;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdopteeController extends Controller {


	public function show(User $adoptee, Meeting $meeting) {

		if ($adoptee->hasRole(Role::ADOPTER)) {
			return abort(403);
		}

		return view('adoptee.show', [
			'meeting' => $meeting,
			'adoptee' => $adoptee
		]);
	}

	public function delete(User $adoptee) {
		$adoptee->delete();

		return redirect()->back()->with('message', 'User Deleted.');
	}
}
