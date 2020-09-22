@extends('layouts.guest')

@section('content')

<div class="w-1/3 mx-auto">
	<h1 class="text-2xl font-bold leading-tight text-black sm:text-3xl">Forgot Password?</h1>
	<p class="text-base font-semibold leading-tight capitalize text-gray-primary">No Worries, we got your back.</p>

	@error('message')
		<div class="flex items-center px-4 py-3 mt-5 text-sm font-bold text-white bg-red-400" role="alert">
			<span class="mr-3 text-white material-icons ">error</span>
			<p class="text-sm leading-tight">{{ $message }}</p>
		</div>
	@enderror

	 @if (session('status'))
	 		<div class="flex items-center px-4 py-3 mt-5 text-sm font-bold text-white bg-green-400" role="alert">
				<span class="mr-3 text-white material-icons ">check_circle</span>
				<p class="text-sm leading-tight">{{ session('status') }}</p>
			</div>
		@endif


  <form method="POST" action="{{ route('password.update') }}" class="mt-10">
		@csrf

		<input type="hidden" name="token" value="{{ $token }}">

		<div class="mb-4">
			<input type="email" placeholder="Email Address*" name="email"
				class="text-input border-b border-solid @error('email') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">
				@error('email') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
		</div>

		<div class="mb-4">
			<input type="password" placeholder="New Password*" name="password"
				class="text-input border-b border-solid @error('email') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">
				@error('password') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
		</div>


		<div class="mb-4">
			<input type="password" placeholder="Confirm Password*" name="password_confirmation"
				class="text-input border-b border-solid @error('email') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">
		</div>


		<div class="flex justify-center mt-10">
				<button type="submit" class="w-full py-3 text-white bg-indigo-600 focus:outline-none">Request Password</button>
			</div>
	</form>
</div>
@endsection
