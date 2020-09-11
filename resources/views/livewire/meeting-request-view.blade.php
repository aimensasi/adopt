<div>
	<div class="row">
		<div class="container">
			<div class="m-2 col-12">
				<div class="w-full card" style="width: 100%;">
					<div class="card-body">
						<h5 class="card-title">{{ $adoptee->name }}</h5>

						<h2 class="mt-5 card-title">Giver Bio</h2>
						<p class="card-text">{{ $adoptee->bio->bio }}</p>

						<h2 class="card-title">Expecting Date</h2>
						<p class="card-text">{{ $adoptee->bio->expecting_date }}</p>

						<h2 class="mt-5">Meeting Request</h2>

					@if ($meeting->status == 'Accepted')
						<div class="capitalize alert alert-success">
							You have accepted a meeting request with {{ $adoptee->name }}, our agency will be in touch with you to set the date and time.
						</div>
					@endif

						<button class="w-full mt-5 ml-auto btn btn-primary d-block" @if($meeting->status != 'Pending') disabled @endif wire:click="onAccept">
							@if($meeting->status != 'Pending')
								{{ $meeting->status }}
							@else
								Accept
							@endif
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
