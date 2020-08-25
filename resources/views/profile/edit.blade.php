@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
				<div class="card">
					<div class="card-header">Family Profile</div>
					<div class="card-body">
						@if ($user->hasRole('Adoptee'))
							<livewire:adoptee />
						@elseif ($user->hasRole('Adopter'))
							<livewire:adopter />
						@endif
					</div>
				</div>
		</div>
	</div>
</div>
@endsection
