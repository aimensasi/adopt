@extends('layouts.app')

@section('content')

<div class="w-full mb-32 bg-no-repeat bg-cover" style="height: 500px; background-image: url('https://images.unsplash.com/photo-1518331647614-7a1f04cd34cf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1049&q=80')">
	<div class="w-full h-full pt-40 pl-32 bg-black bg-opacity-75">
		<h2 class="text-4xl font-extrabold leading-10 tracking-tight text-indigo-600 sm:text-5xl sm:leading-none md:text-6xl">
			Child Details
		</h2>
		<p class="pt-5 mt-3 text-base text-justify text-white sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
			Update the personal details of the child listed for adoption
		</p>
	</div>
</div>

<div class="w-1/3 mx-auto">
	@if (session()->has('message'))
		<div class="flex items-center px-4 py-3 mt-5 text-sm font-bold text-white bg-green-400" role="alert">
			<span class="mr-3 text-white material-icons ">done</span>
			<p class="text-sm leading-tight">{{ session('message') }}</p>
		</div>
	@endif


	@if($errors->any())
		<div class="flex items-center px-4 py-3 mt-5 text-sm font-bold text-white bg-red-400" role="alert">
			<span class="mr-3 text-white material-icons ">error</span>
			<p class="text-sm leading-tight">{{ $errors->first() }}</p>
		</div>
	@endif


	<form method="POST" action="{{ route('children.store') }}" class="mt-10" enctype="multipart/form-data">
		@csrf
		<div class="mb-4">
			<input type="text" placeholder="Full Name*" name="name"
				class="text-input border-b border-solid @error('name') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">
				@error('name') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
		</div>
		<div class="mb-4">
			<textarea row="5" placeholder="Bio..." name="bio"
				class="text-input border-b border-solid @error('bio') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black"></textarea>
				@error('bio') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
		</div>
		<div class="mb-4">
			<input type="text" placeholder="Age*" name="age"
				class="text-input border-b border-solid @error('age') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">
				@error('age') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
		</div>
		<div class="mb-4">
			<input type="text" placeholder="Nationality*" name="nationality"
				class="text-input border-b border-solid @error('nationality') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">
				@error('nationality') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
		</div>
		<div class="mb-4">
			<input type="text" placeholder="Gender*" name="gender"
				class="text-input border-b border-solid @error('gender') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">
				@error('gender') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
		</div>

		<div class="mb-4">
			<input type="file" placeholder="Picture*" name="picture"
				class="text-input border-b border-solid @error('picture') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">
				@error('picture') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
		</div>

		<div class="flex justify-center mt-10">
			<button type="submit" class="w-full py-3 text-white bg-indigo-600 focus:outline-none">Update</button>
		</div>
	</form>
</div>
@endsection
