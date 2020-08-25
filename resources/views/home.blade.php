@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			@includeWhen($isAdopter, 'adopters.index')
			@includeWhen(!$isAdopter, 'adoptee.index')
		</div>
	</div>
</div>
@endsection
