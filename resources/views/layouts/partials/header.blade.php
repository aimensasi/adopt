<div class="fixed z-10 w-full bg-white" x-data="{ open: false}">
	<div class="relative px-4 pt-6 pb-4 sm:px-6 lg:px-8">
		<nav class="relative flex items-center justify-between sm:h-10 lg:justify-start">
			<div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
				<div class="flex items-center justify-between w-full md:w-auto">
					<a href="/" aria-label="Home">
						<img class="w-auto h-8 sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-on-white.svg" alt="Logo">
					</a>
					<div class="flex items-center -mr-2 md:hidden">
						<button type="button" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500" id="main-menu" aria-label="Main menu" aria-haspopup="true" @click="open = true">
							<svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
							</svg>
						</button>
					</div>
				</div>
			</div>
			<div class="hidden md:block md:ml-8 md:pr-2">
				@auth
					@if(auth()->user()->hasRole('Admin'))
						<a href="/home" class="font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-900">Meeting Matches</a>
						<a href="/adopters" class="ml-8 font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-900">Adopters</a>
						<a href="/expecting-mothers" class="ml-8 font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-900">Expected Mothers</a>
					@elseif(auth()->user()->hasRole('Adoptee'))
						<a href="/home" class="font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-900">Families</a>
					@elseif(auth()->user()->hasRole('Adopter'))
						<a href="/home" class="font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-900">Meeting Requests</a>
					@endif
				@endauth
				<a href="/#about-us" class="ml-8 font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-900">About Us</a>
				<a href="/#ready" class="ml-8 font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-900">Ready To Adopt?</a>
				<a href="/#considering" class="ml-8 font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-900">Considering Adoption?</a>
				@auth
					@if(auth()->user()->hasRole('Admin'))
					@else
						<a href="/profile" class="ml-8 font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-900">Profile</a>
					@endif
					<a href="/logout" class="ml-8 font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-900">Logout</a>
				@else
					<a href="/login" class="ml-8 font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-900">Log in</a>
				@endauth
			</div>
		</nav>
	</div>
	<div class="absolute inset-x-0 top-0 p-2 transition origin-top-right transform md:hidden" x-show="open">
		<div class="rounded-lg shadow-md">
			<div class="overflow-hidden bg-white rounded-lg shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="main-menu">
				<div class="flex items-center justify-between px-5 pt-4">
					<div>
						<img class="w-auto h-8" src="https://tailwindui.com/img/logos/workflow-mark-on-white.svg" alt="">
					</div>
					<div class="-mr-2">
						<button type="button" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500" aria-label="Close menu" @click="open = false">
							<svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
							</svg>
						</button>
					</div>
				</div>
				<div class="px-2 pt-2 pb-3">
					<a href="/home" class="block px-3 py-2 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50" role="menuitem">Home</a>
					<a href="#about-us" class="block px-3 py-2 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50" role="menuitem">About Us</a>
					<a href="#ready" class="block px-3 py-2 mt-1 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50" role="menuitem">Ready To Adopt?</a>
					<a href="#considering" class="block px-3 py-2 mt-1 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50" role="menuitem">Considering Adoption?</a>
				</div>
				<div>
					@auth
						@if(auth()->user()->hasRole('Admin'))
						@else
							<a href="/profile" class="block w-full px-5 py-3 font-medium text-center text-indigo-600 transition duration-150 ease-in-out bg-gray-50 hover:bg-gray-100 hover:text-indigo-700 focus:outline-none focus:bg-gray-100 focus:text-indigo-700" role="menuitem">
								Profile
							</a>
						@endif
						<a href="/logout" class="block w-full px-5 py-3 font-medium text-center text-indigo-600 transition duration-150 ease-in-out bg-gray-50 hover:bg-gray-100 hover:text-indigo-700 focus:outline-none focus:bg-gray-100 focus:text-indigo-700" role="menuitem">
							Logout
						</a>

					@else
						<a href="/login" class="block w-full px-5 py-3 font-medium text-center text-indigo-600 transition duration-150 ease-in-out bg-gray-50 hover:bg-gray-100 hover:text-indigo-700 focus:outline-none focus:bg-gray-100 focus:text-indigo-700" role="menuitem">
							Log in
						</a>
					@endauth
				</div>

			</div>
		</div>
	</div>
</div>
