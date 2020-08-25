<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentComponent extends Component {


	public $clientToken;
	protected $listeners = ['confirm' => 'onConfirm'];



	public function mount($clientToken) {
		$this->clientToken = $clientToken;
	}

	public function onConfirm($nonce) {
		$gateway = new \Braintree\Gateway([
			'environment' => 'sandbox',
			'merchantId' => '4b8gb23b2h8n2sc9',
			'publicKey' => 's33bzx4xz3mzhz99',
			'privateKey' => 'd9529e53d3527852d683bbff696a7630'
		]);

		$result = $gateway->transaction()->sale([
			'amount' => '500.00',
			'paymentMethodNonce' => $nonce,
		]);

		$user = auth()->user();
		$user->MarkAsPaid();



		session()->flash('success', 'Payment was made successfully');
		return redirect()->route('home');
	}



	public function render() {
		return view('livewire.payment-component');
	}
}
