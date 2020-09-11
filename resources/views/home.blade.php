@extends('layouts.app')

@section('content')
	@includeWhen($role == \App\Role::ADOPTER, 'adopters.index')
	@includeWhen($role == \App\Role::ADOPTEE, 'adoptee.index')
	@includeWhen($role == \App\Role::ADMIN, 'admin.index')
@endsection



