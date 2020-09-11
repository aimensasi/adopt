<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentComponent extends Component {


	public $clientSecret;
	protected $listeners = ['confirm' => 'onConfirm'];



	public function mount($clientSecret) {
		$this->clientSecret = $clientSecret;
	}

	public function onConfirm() {
		$user = auth()->user();
		$user->MarkAsPaid();

		session()->flash('success', 'Payment was made successfully');
		return redirect()->route('home');
	}



	public function render() {
		return view('livewire.payment-component');
	}
}
