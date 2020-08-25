<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MeetingRequests extends Component {

	public $meetings;

	public function mount() {
		$this->meetings = $this->user->MeetingRequests;
	}

	public function getUserProperty() {
		return auth()->user();
	}


	public function onView($id) {
		return redirect()->route('adopters.show', $id);
	}

	public function render() {
		return view('livewire.meeting-requests');
	}
}
