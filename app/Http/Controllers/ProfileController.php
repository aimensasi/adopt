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
		Stripe::setApiKey($secret);
	}


	public function profileShow() {
		return view(self::PATH . 'edit');
	}

	public function pay() {
		$key = config('services.stripe.key');


		$intent = PaymentIntent::create([
			'amount' => round(500 * 100),
			'currency' => 'myr',
			'receipt_email' => auth()->user()->email,
		]);


		return view(self::PATH . 'pay', [
			'clientSecret' => $intent->client_secret,
		]);
	}
}
