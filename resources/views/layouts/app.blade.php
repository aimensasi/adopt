<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<!-- Styles -->
		 <livewire:styles />
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<script src="https://js.stripe.com/v3/"></script>
</head>
<body>

	<div class="relative overflow-hidden bg-white">
		<div class="w-full">
			@include('layouts.partials.header')
			<main class="w-full @if(!request()->is('/')) pt-40 mb-10 @endif">
				@yield('content')
			</main>
		</div>
	</div>

	<livewire:scripts />
	@stack('scripts')
</body>
</html>
