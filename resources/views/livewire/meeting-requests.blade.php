<div>
  @if(!$user->profileUpdate())
		<div class="alert alert-primary" role="alert">
			Set up your family profile in order to get listed on our prospect parents page
			<a href="{{ route('profile.get') }}">Here</a>
		</div>
	@endif
	@if($user->profileUpdate() && !$user->profilePublished())
		<div class="alert alert-primary" role="alert">
			Make payment so your profile in order to get listed on our prospect parents page
			<a href="{{ route('pay') }}">Here</a>
		</div>
	@endif


	@if (session()->has('message'))
		<div class="alert alert-success text-capitalize">
			{{ session('message') }}
		</div>
	@endif

	<div class="card">
		<div class="card-header">Home</div>

		<div class="card-body">
			@foreach ($meetings as $meeting)
				<div class="d-flex flex-row p-3" role="alert" style="background: #F7F7F7">
					<h2 class="text-base d-block-inline">{{ $meeting->adopter->name }}</h2>
					<span class="ml-auto my-auto">Sent on {{ $meeting->created_at->format('d/m/Y') }}</span>
					<i class="far fa-eye ml-4 my-auto" wire:click="onView({{ $meeting->adopter->id }})"></i>
				</div>
			@endforeach
		</div>
	</div>

</div>
