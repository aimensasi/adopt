@extends('layouts.app')

@section('content')

	<div class="flex w-1/2 mx-auto">
		<a href="/home" class="inline-block pt-6 transition-all duration-300 ease-in transform bg-transparent border-0 focus:outline-none hover:-translate-x-2" >
			<span class="mb-5 text-4xl material-icons">keyboard_backspace</span>
		</a>
	</div>

<div class="w-1/2 px-10 py-10 mx-auto border shadow-md">

	<h2 class="text-2xl font-light text-gray-900">Personal Details</h2>

	@if (auth()->user()->hasRole(\App\Role::ADOPTEE))
		<livewire:adoptee />
	@elseif (auth()->user()->hasRole(\App\Role::ADOPTER))
		<livewire:adopter />
	@endif
</div>
@endsection
