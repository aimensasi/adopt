<div class="w-1/2 mx-auto">
	<form id="payment-form" class="form">
		<h1 class="mb-5 text-xl font-light text-gray-900">Total Price: MYR 500</h1>

		<div id="card-element"><!--Stripe.js injects the Card Element--></div>
		<button id="submit" class="pay-btn">
			<div class="hidden spinner" id="spinner"></div>
			<span id="button-text">Pay</span>
		</button>
		<p id="card-error" role="alert"></p>
	</form>
</div>


@push('scripts')
	<script>
		var stripe = Stripe("pk_test_51HDpsZDO5N3x7BUrTVwYo9qLvFENFkraPxkc7Sm5P5sQhHckPTEMxh6UJqhUljdKhnZp5z3DjALrUm5GD52NWclX00nXZlwGBY");


		var elements = stripe.elements();
		var style = {
			base: {
				color: "#32325d",
				fontFamily: 'Arial, sans-serif',
				fontSmoothing: "antialiased",
				fontSize: "16px",
				"::placeholder": {
				}
			},
			invalid: {
				fontFamily: 'Arial, sans-serif',
				color: "#fa755a",
			}
		};


		var card = elements.create("card", { style: style });

		// Stripe injects an iframe into the DOM
		card.mount("#card-element");
		card.on("change", function (event) {
			// Disable the Pay button if there are no card details in the Element
			document.querySelector("button").disabled = event.empty;
			document.querySelector("#card-error").textContent = event.error ? event.error.message : "";
		});

		var form = document.getElementById("payment-form");

		form.addEventListener("submit", function(event) {
			event.preventDefault();
			// Complete payment when the submit button is clicked
			payWithCard(stripe, card, '{{ $clientSecret }}');
		});


		// Calls stripe.confirmCardPayment
		// If the card requires authentication Stripe shows a pop-up modal to
		// prompt the user to enter authentication details without leaving your page.
		var payWithCard = function(stripe, card, clientSecret) {
			loading(true);
			stripe
				.confirmCardPayment(clientSecret, {
					payment_method: {
						card: card
					}
				})
				.then(function(result) {
					if (result.error) {
						// Show error to your customer
						showError(result.error.message);
					} else {
						// The payment succeeded!
						orderComplete(result.paymentIntent.id);
					}
				});
		};
		/* ------- UI helpers ------- */
		// Shows a success message when the payment is complete
		var orderComplete = function(paymentIntentId) {
			loading(false);
			window.livewire.emit('confirm');
			document.querySelector("button").disabled = true;
		};


		// Show the customer the error from Stripe if their card fails to charge
		var showError = function(errorMsgText) {
			loading(false);
			var errorMsg = document.querySelector("#card-error");
			errorMsg.textContent = errorMsgText;
			setTimeout(function() {
				errorMsg.textContent = "";
			}, 4000);
		};
		// Show a spinner on payment submission
		var loading = function(isLoading) {
			if (isLoading) {
				// Disable the button and show a spinner
				document.querySelector("button").disabled = true;
				document.querySelector("#spinner").classList.remove("hidden");
				document.querySelector("#button-text").classList.add("hidden");
			} else {
				document.querySelector("button").disabled = false;
				document.querySelector("#spinner").classList.add("hidden");
				document.querySelector("#button-text").classList.remove("hidden");
			}
		};
	</script>
@endpush



