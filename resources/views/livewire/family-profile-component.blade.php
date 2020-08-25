<div class="container">

	<div class="row justify-content-center">
		<div class="col-md-8">
			@if (session()->has('message'))
				<div class="alert alert-success text-capitalize">
						{{ session('message') }}
				</div>
			@endif
			<div id="sliders" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					@foreach($adopter->profile->photos as $photo)
						<div class="carousel-item @if($loop->first) active @endif">
							<img src="{{ $photo->url }}" class="d-block w-100 rounded" height="500" width="1000" alt="...">
						</div>
					@endforeach
				</div>
				<a class="carousel-control-prev" href="#sliders" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#sliders" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>

			<h2 class="d-block mt-5">{{ $adopter->name }}</h2>

			<div class="d-block mt-5">
				<h4>Why Adoption</h4>
				<p class="text-justify">{{ $adopter->profile->why_adoption }}</p>
			</div>
			<div class="d-block mt-5">
				<h4>About Us</h4>
				<p class="text-justify">{{ $adopter->profile->about_us }}</p>
			</div>
			<div class="d-block mt-5">
				<h4>Our Home</h4>
				<p class="text-justify">{{ $adopter->profile->our_home }}</p>
			</div>

			@if($isAdopter)
				<button class="btn btn-primary d-block ml-auto w-full mt-5" @if($status) disabled @endif wire:click="onRequestMeeting">
					@if($status)
						{{ $status }}
					@else
						Request Meeting
					@endif
				</button>
			@else
				<button class="btn btn-primary d-block ml-auto w-full mt-5" @if($status) disabled @endif wire:click="onAcceptMeeting">
					@if($status)
						{{ $status }}
					@else
						Accept
					@endif
				</button>
			@endif

		</div>
	</div>
</div>


