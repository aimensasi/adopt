@extends('layouts.app')

@section('content')

<div class="w-full mb-32 bg-no-repeat bg-cover" style="height: 500px; background-image: url('https://images.unsplash.com/photo-1518331647614-7a1f04cd34cf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1049&q=80')">
	<div class="w-full h-full pt-40 pl-32 bg-black bg-opacity-75">
		<h2 class="text-4xl font-extrabold leading-10 tracking-tight text-indigo-600 sm:text-5xl sm:leading-none md:text-6xl">
			Adopters List
		</h2>
		<p class="pt-5 mt-3 text-base text-justify text-white sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
			Pellentesque imperdiet vestibulum semper. Donec elementum posuere auctor. Vestibulum non sodales nibh, et porttitor lorem. Mauris sed nisi a mauris vulputate vestibulum venenatis id augue. Cras fermentum dolor vel pharetra placerat. Proin in orci blandit, cursus odio id, laoreet ipsum. Vestibulum auctor tincidunt lacus sit amet fermentum.
		</p>
	</div>
</div>

@foreach ($adopters as $adopter)
		<div class="w-2/3 max-w-sm mx-auto mb-10 shadow-md lg:max-w-full lg:flex">
			<div class="flex-none h-48 overflow-hidden text-center bg-cover rounded-t lg:h-auto lg:w-48 lg:rounded-t-none lg:rounded-l" title="Family"
			@if($url = $adopter->profileImage())
				style="background-image: url('{{ $url }}')">
			@else
				style="background-image: url('https://images.unsplash.com/photo-1531984929664-2fb2be468d3e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80')">
			@endif
			</div>
			<div class="flex flex-col justify-between p-4 leading-normal bg-white border-b border-l border-r border-gray-400 rounded-b lg:border-l-0 lg:border-t lg:border-gray-400 lg:rounded-b-none lg:rounded-r">
				<div class="mb-8">
					<div class="mb-2 text-xl font-bold text-gray-900">{{ $adopter->name }}</div>
					<p class="text-base text-gray-700">{{ \Str::of($adopter->profile->about_us)->limit(140) }}</p>
				</div>
				<div class="flex items-center">
					<a class="ml-auto text-indigo-600 transition-all duration-700 ease-in-out hover:text-indigo-300" href="{{ route('adopters.show', $adopter) }}">View Details</a>
				</div>
			</div>
		</div>
		@endforeach
@endsection
