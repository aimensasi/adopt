<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class ProfileController extends Controller {

	public const PATH = 'profile.';

	public function __construct() {
		$secret = config('services.stripe.secret');
		// dd($secret);
		Stripe::setApiKey($secret);
	}


	public function profileShow() {
		return view(self::PATH . 'edit');
	}

	public function pay() {
		$key = config('services.stripe.key');


		// $intent = PaymentIntent::create([
		// 	'amount' => round(500 * 100),
		// 	'currency' => 'myr',
		// 	// 'receipt_email' => auth()->user()->email,
		// ]);

		$gateway = new \Braintree\Gateway([
			'environment' => 'sandbox',
			'merchantId' => '4b8gb23b2h8n2sc9',
			'publicKey' => 's33bzx4xz3mzhz99',
			'privateKey' => 'd9529e53d3527852d683bbff696a7630'
		]);

		$clientToken = $gateway->clientToken()->generate();


		return view(self::PATH . 'pay', [
			'clientToken' => $clientToken,
		]);
	}
}
