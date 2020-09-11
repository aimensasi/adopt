<?php

namespace App\Http\Livewire;

use App\Meeting;
use App\User;
use Livewire\Component;

class MeetingRequestView extends Component {

	public $meeting;
	public $adoptee;

	public function mount(User $adoptee, Meeting $meeting) {
		$this->adoptee = $adoptee;
		$this->meeting = $meeting;
	}


	public function onAccept() {
		$this->meeting->status = 'Accepted';
		$this->meeting->save();

		$this->meeting->refresh();
	}

	public function render() {
		return view('livewire.meeting-request-view');
	}
}
