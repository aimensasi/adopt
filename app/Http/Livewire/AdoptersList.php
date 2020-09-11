<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class AdoptersList extends Component {


	public function fetch() {
	}


	public function render() {
		return view('livewire.adopters-list', [
			'adopters' => User::adopters()->get(),
		]);
	}
}
