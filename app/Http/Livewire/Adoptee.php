<?php

namespace App\Http\Livewire;

use App\AdopteeBio;
use Livewire\Component;

class Adoptee extends Component {

	public $bio;
	public $date;
	public $adopteeBio;

	public function mount() {
		$this->adopteeBio = auth()->user()->bio;
		$this->bio = optional($this->adopteeBio)->bio;
		$this->date = optional(optional($this->adopteeBio)->expecting_date)->format('Y-m-d');
	}

	public function update() {

		$this->validate([
			'bio' => 'required',
			'date' => 'required'
		]);

		if ($this->adopteeBio == null) {
			$this->adopteeBio = new AdopteeBio();
			$this->adopteeBio->user_id = auth()->user()->id;
		}

		$this->adopteeBio->bio = $this->bio;
		$this->adopteeBio->expecting_date = $this->date;
		$this->adopteeBio->save();

		$this->adopteeBio->refresh();
	}

	public function render() {
		return view('livewire.adoptee');
	}
}
