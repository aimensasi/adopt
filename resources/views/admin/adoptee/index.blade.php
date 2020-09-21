@extends('layouts.app')

@section('content')

@if (session()->has('message'))
	<div class="flex items-center w-2/3 px-4 py-3 mx-auto mt-5 mb-10 text-sm font-bold bg-green-400 bg-red" role="alert">
		<span class="mr-3 text-white material-icons">verified</span>
		<p class="text-sm leading-tight text-white">{{ session('message') }}</p>
	</div>
@endif

<div class="w-2/3 max-w-sm mx-auto mb-10 lg:max-w-full lg:flex">
	<h2 class="text-xl text-gray-900 capitalize">Expecting Mothers</h2>
</div>

@foreach ($adoptees as $adoptee)
		<div class="w-2/3 max-w-sm mx-auto mb-10 shadow-md lg:max-w-full lg:flex">
			<div class="flex flex-col justify-between p-4 leading-normal bg-white border-b border-l border-r border-gray-400 rounded-b lg:border-l-0 lg:border-t lg:border-gray-400 lg:rounded-b-none lg:rounded-r">
				<div class="mb-8">
					<div class="mb-2 text-xl font-bold text-gray-900">{{ $adoptee->name }}</div>
					<p class="text-base text-gray-700">{{ \Str::of($adoptee->bio->bio)->limit(140) }}</p>
					<p class="text-base text-gray-700">Expecting Date: {{ optional($adoptee->bio->expecting_date)->format('Y/m/d') }}</p>
					<p class="text-base text-gray-700">Email: {{ $adoptee->email }}</p>
					<p class="text-base text-gray-700">Phone Number: {{ $adoptee->phone_number }}</p>
				</div>
				<div class="flex items-center">
					<a class="ml-auto text-red-600 transition-all duration-700 ease-in-out hover:text-red-300" href="{{ route('adoptees.delete', $adoptee->id) }}">Delete Account</a>
				</div>
			</div>
		</div>
		@endforeach
@endsection
