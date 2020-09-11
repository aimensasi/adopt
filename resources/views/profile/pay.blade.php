@extends('layouts.app')

@section('content')
	<livewire:payment-component :clientSecret="$clientSecret"/>
@endsection

{{--
@push('scripts')
	<script>
		var button = document.querySelector('#submit-button');
		console.log("Yeas", '{{ $clientToken }}');
    braintree.dropin.create({
      authorization: '{{ $clientToken }}',
      container: '#dropin-container'
    }, function (createErr, instance) {
      button.addEventListener('click', function (e) {
				e.preventDefault();
				console.log("Clicked...", instance);
        instance.requestPaymentMethod(function (err, payload) {
          console.log("JJJ...", payload);
        });
      });
    });
	</script>
@endpush


 --}}
