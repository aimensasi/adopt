<div wire:init="fetch" class="row">
	@foreach ($adopters as $adopter)
	{{-- <h1>{{ $adopter->profile }}</h1> --}}
		<div class="col m-2">
			<div class="card" style="width: 18rem;">
				<img src="{{ $adopter->profileImage() }}" class="card-img-top" alt="..." width="286px" height="198px">
				<div class="card-body">
					<h5 class="card-title">{{ $adopter->name }}</h5>
					<p class="card-text">{{ \Illuminate\Support\Str::limit($adopter->profile->about_us, 100, '...') }}</p>
					<a href="{{ route('adopters.show', $adopter) }}" class="btn btn-primary">View more details</a>
				</div>
			</div>
		</div>
	@endforeach

	<div class="mx-auto mt-5">
		{{ $adopters->links() }}
	</div>
</div>
