<?php

namespace App\Http\Livewire;

use App\Meeting;
use Livewire\Component;

class MeetingRequests extends Component {

	public $meetings;

	public function mount() {
		$this->meetings = $this->user->MeetingRequests;
	}

	public function getUserProperty() {
		return auth()->user();
	}


	public function onAccept($id) {
		$meeting = Meeting::find($id);
		$meeting->status = 'Accepted';
		$meeting->save();

		$this->meetings = $this->meetings->fresh();
		session()->flash('message', 'Great, Our team will be in touch with you to set the meeting.');
	}

	public function render() {
		return view('livewire.meeting-requests');
	}
}
