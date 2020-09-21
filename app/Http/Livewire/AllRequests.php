<?php

namespace App\Http\Livewire;

use App\Meeting;
use Livewire\Component;

class AllRequests extends Component {

	/**
	 * @var Collection
	 */
	public $meetings = [];

	public function mount() {
		$this->meetings = Meeting::whereUserExists()->get();
	}


	public function onComplete($id) {
		$meeting = Meeting::find($id);

		$meeting->status = 'Complete';
		$meeting->save();

		$this->meetings = $this->meetings->fresh();
	}

	public function onReject($id) {
		$meeting = Meeting::find($id);

		$meeting->status = 'Reject';
		$meeting->save();

		$this->meetings = $this->meetings->fresh();
	}


	public function render() {
		return view('livewire.all-requests');
	}
}
