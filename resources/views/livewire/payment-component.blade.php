<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
				<div class="card">
					<div class="card-header">Payment</div>
					<div class="card-body">
						<div id="dropin-container"></div>
						<button id="submit-button" class="btn btn-primary mt-4 d-block mx-auto" wire:loading.attr="disabled">
							<div wire:loading>
								Processing Payment...
							</div>

							<div wire:loading.remove>
								Pay
							</div>
						</button>

					</div>
				</div>
		</div>
	</div>
</div>


@push('scripts')
	<script>
		var button = document.querySelector('#submit-button');

    braintree.dropin.create({
      authorization: '{{ $clientToken }}',
      container: '#dropin-container'
    }, function (createErr, instance) {
      button.addEventListener('click', function (e) {
				e.preventDefault();
        instance.requestPaymentMethod(function (err, payload) {
					window.livewire.emit('confirm', payload.nonce);
        });
      });
    });
	</script>
@endpush



