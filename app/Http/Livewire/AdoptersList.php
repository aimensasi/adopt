<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdoptersList extends Component {
	use WithPagination;


	public function fetch() {
	}


	public function render() {
		return view('livewire.adopters-list', [
			'adopters' => User::adopters()->paginate(10),
		]);
	}
}
