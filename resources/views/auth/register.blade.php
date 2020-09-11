@extends('layouts.app')

{{-- @php
	if(session('errors')){

		dd(session('errors'));
	}
@endphp --}}


@section('content')
	<div class="w-1/3 mx-auto">
		<h1 class="text-2xl font-bold leading-tight text-black sm:text-3xl">Get Started</h1>
		<p class="text-base font-semibold leading-tight text-gray-primary">Let’s get you started with few steps</p>

		<h2 class="pt-10 text-lg font-bold leading-tight text-black sm:text-xl">Tell us about yourself</h2>
		<p class="text-base font-semibold leading-tight text-gray-primary">This will help us in providing you with an unique experience.</p>

		@if($errors->any())
			<div class="flex items-center px-4 py-3 mt-5 text-sm font-bold text-white bg-red-400" role="alert">
				<span class="mr-3 text-white material-icons ">error</span>
				<p class="text-sm leading-tight">{{ $errors->first() }}</p>
			</div>
		@endif


		<form method="POST" action="{{ route('register') }}" class="mt-10">
			@csrf
			<input type="hidden" value="{{ $target }}" name="target">

			<div class="mb-4">
				<input type="email" placeholder="Email Address*" name="email"
					class="text-input border-b border-solid @error('email') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">
					@error('email') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
			</div>
			<div class="mb-4">
				<input type="text" placeholder="Full Name*" name="name"
					class="text-input border-b border-solid @error('email') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">
					@error('name') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
			</div>
			<div class="mb-4">
				<input type="text" placeholder="Phone Number*" name="phone_number"
					class="text-input border-b border-solid @error('email') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">
					@error('phone_number') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
			</div>
			<div class="mb-4">
				<input type="password" placeholder="Password*" name="password"
					class="text-input border-b border-solid @error('email') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">
					@error('password') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
			</div>
			<div class="mb-4">
				<input type="password" placeholder="Confirm Password*" name="password_confirmation"
					class="text-input border-b border-solid @error('email') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">
			</div>


			<div class="flex justify-center mt-10">
				<button type="submit" class="w-full py-3 text-white bg-indigo-600 focus:outline-none">Register</button>
			</div>
		</form>
	</div>

@endsection
