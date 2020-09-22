@extends('layouts.guest')

@section('content')
<div class="w-1/3 mx-auto">
		<h1 class="text-2xl font-bold leading-tight text-black sm:text-3xl">Welcome Back</h1>
		<p class="text-base font-semibold leading-tight text-gray-primary">Login To Continue</p>


		@error('message')
			<div class="flex items-center px-4 py-3 mt-5 text-sm font-bold text-white bg-red-400" role="alert">
				<span class="mr-3 text-white material-icons ">error</span>
				<p class="text-sm leading-tight">{{ $message }}</p>
			</div>
		@enderror


		<form method="POST" action="{{ route('login') }}" class="mt-10">
			@csrf

			<div class="mb-4">
				<input type="email" placeholder="Email Address*" name="email"
					class="text-input border-b border-solid @error('email') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">
					@error('email') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
			</div>
			<div class="mb-4">
				<input type="password" placeholder="Password*" name="password"
					class="text-input border-b border-solid @error('email') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">
					@error('password') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
			</div>

			@if (Route::has('password.request'))
				<a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
					{{ __('Forgot your password?') }}
				</a>
			@endif

			<div class="flex justify-center mt-10">
				<button type="submit" class="w-full py-3 text-white bg-indigo-600 focus:outline-none">Login</button>
			</div>
		</form>
	</div>
@endsection
