<?php

namespace App\Http\Livewire;

use App\Meeting;
use App\Role;
use App\User;
use Livewire\Component;

class FamilyProfileComponent extends Component {

	public $adopter;
	public $status;
	public $isAdopter;

	public function mount(User $adopter) {
		$this->adopter = $adopter;
		$this->isAdopter = $this->user->hasRole(Role::ADOPTER);

		$meeting = Meeting::where('adopter_id', $adopter->id)
			->where('adoptee_id', auth()->user()->id)->first();


		$this->status = $meeting->status;
	}

	public function getUserProperty() {
		return auth()->user();
	}

	public function onRequestMeeting() {
		// dd($this->adopter->id);

		$meeting = Meeting::create([
			'adopter_id' => $this->adopter->id,
			'adoptee_id' => $this->user->id,
			'status' => Meeting::PENDING,
		]);

		$this->status = $meeting->status;

		session()->flash('message', 'Meeting Request Has Been Sent, We will notify you when the request is approved.');
	}


	public function render() {
		return view('livewire.family-profile-component');
	}
}
