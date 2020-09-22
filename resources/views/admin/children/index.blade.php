@extends('layouts.app')

@section('content')

<div class="w-full mb-32 bg-no-repeat bg-cover" style="height: 500px; background-image: url('https://images.unsplash.com/photo-1518331647614-7a1f04cd34cf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1049&q=80')">
	<div class="w-full h-full pt-40 pl-32 bg-black bg-opacity-75">
		<h2 class="text-4xl font-extrabold leading-10 tracking-tight text-indigo-600 sm:text-5xl sm:leading-none md:text-6xl">
			Children List
		</h2>
		<p class="pt-5 mt-3 text-base text-justify text-white sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
			@if(auth()->user()->hasRole('Admin'))
				Here you can add Children from different insititution that are looking for families
			@else
				Here you can see childrens that are up for adoption
			@endif
		</p>
	</div>
</div>

	<div class="w-3/4 mx-auto mb-10">
		@if (session()->has('message'))
			<div class="flex items-center px-4 py-3 mt-5 text-sm font-bold text-white bg-green-400" role="alert">
				<span class="mr-3 text-white material-icons ">done</span>
				<p class="text-sm leading-tight">{{ session('message') }}</p>
			</div>
		@endif
	</div>

	@if(auth()->user()->hasRole('Admin'))
		<div class="flex items-center w-3/4 mx-auto">
			<a class="px-8 py-1 mt-5 mb-5 ml-auto mr-5 text-white transition-all duration-700 ease-in-out bg-indigo-600 border border-indigo-600 rounded-full hover:bg-indigo-300" href="{{ route('children.create') }}">Create</a>
		</div>
	@endif
	<div class="flex flex-wrap w-3/4 mx-auto">
		@foreach ($children as $child)
			<div class="w-2/5 mx-auto mb-5 mr-5 overflow-hidden rounded shadow-lg">
				<img class="w-full h-64" src="{{ $child->picture }}" alt="Sunset in the mountains">
				<div class="px-6 py-4">
					<div class="mb-2 text-xl font-bold">{{ $child->name }}</div>
					<p class="text-base text-gray-700">
						{{ Str::limit($child->bio, 150) }}
					</p>
				</div>
				<div class="px-6 pt-4 pb-2">
					<span class="inline-block px-3 py-1 mb-2 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">{{ $child->age }} years</span>
					<span class="inline-block px-3 py-1 mb-2 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">{{ $child->gender }}</span>
					<span class="inline-block px-3 py-1 mb-2 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">{{ $child->nationality }}</span>
				</div>
				@if(auth()->user()->hasRole('Admin'))
					<div class="flex items-center">
						<a class="px-8 py-1 mt-5 mb-5 ml-auto mr-5 text-indigo-600 transition-all duration-700 ease-in-out border border-indigo-600 rounded-full hover:text-indigo-300" href="{{ route('children.edit', $child->id) }}">View</a>
					</div>
				@elseif(auth()->user()->hasRole('Adopter'))
					<div class="flex items-center">
						<a class="px-8 py-1 mt-5 mb-5 ml-auto mr-5 text-indigo-600 transition-all duration-700 ease-in-out border border-indigo-600 rounded-full hover:text-indigo-300" href="{{ route('children.request', $child->id) }}">
							@if($child->requests()->hasRequestFromAdopter())
								{{  $child->requests()->requestStatus() }}
							@else
								Request Meeting
							@endif
						</a>
					</div>
				@endif
			</div>
		@endforeach
	</div>
@endsection
