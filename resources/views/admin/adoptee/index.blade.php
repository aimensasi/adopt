@extends('layouts.app')

@section('content')

<div class="w-full mb-32 bg-no-repeat bg-cover" style="height: 500px; background-image: url('https://images.unsplash.com/photo-1503431760783-91f2569f6802?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80')">
	<div class="w-full h-full pt-40 pl-32 bg-black bg-opacity-75">
		<h2 class="text-4xl font-extrabold leading-10 tracking-tight text-indigo-600 sm:text-5xl sm:leading-none md:text-6xl">
			Expecting Mothers List
		</h2>
		<p class="pt-5 mt-3 text-base text-justify text-white sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
			Pellentesque imperdiet vestibulum semper. Donec elementum posuere auctor. Vestibulum non sodales nibh, et porttitor lorem. Mauris sed nisi a mauris vulputate vestibulum venenatis id augue. Cras fermentum dolor vel pharetra placerat. Proin in orci blandit, cursus odio id, laoreet ipsum. Vestibulum auctor tincidunt lacus sit amet fermentum.
		</p>
	</div>
</div>


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
