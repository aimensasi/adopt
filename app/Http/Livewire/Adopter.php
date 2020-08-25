<?php

namespace App\Http\Livewire;

use App\Album;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Adopter extends Component {
	use WithFileUploads;

	public $whyAdoption;
	public $aboutUs;
	public $ourHome;
	public $photos;
	public $tempPhotos;

	public function mount() {


		$this->fill([
			'whyAdoption' => $this->profile->why_adoption,
			'aboutUs' => $this->profile->about_us,
			'ourHome' => $this->profile->our_home,
			'photos' => $this->profile->photos,
		]);
	}

	public function getProfileProperty() {
		return Auth::user()->profile;
	}

	public function updatePhotos() {
		$this->photos = $this->profile->photos;
	}


	public function update() {
		$this->validate([
			'photos.*' => 'image|max:2048', // 2MB Max
		]);


		$this->profile->why_adoption = $this->whyAdoption;
		$this->profile->about_us = $this->aboutUs;
		$this->profile->our_home = $this->ourHome;
		$this->profile->save();

		foreach ($this->tempPhotos as $photo) {
			$url = $photo->store('album');
			$album = new Album();
			$album->url = $url;

			$this->profile->photos()->save($album);
		}


		$this->updatePhotos();
		$this->tempPhotos = null;

		session()->flash('message', 'Profile successfully updated.');
	}


	public function render() {
		return view('livewire.adopter');
	}
}
