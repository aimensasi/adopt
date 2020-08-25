<?php

namespace App\Exceptions;

use Exception;

class InvalidRequestException extends Exception {

	// Redefine the exception so message isn't optional
	public function __construct($message = null, $code = 0, Exception $previous = null) {
		$message = $message ?? 'Invalid Request Exception.';
		// make sure everything is assigned properly
		parent::__construct($message, $code, $previous);
	}
}
