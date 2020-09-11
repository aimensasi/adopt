<div class="w-2/3 mx-auto">

	@if (session()->has('message'))
		<div class="flex items-center px-4 py-3 mt-5 text-sm font-bold bg-green-400 bg-red" role="alert">
			<span class="mr-3 text-white material-icons">verified</span>
			<p class="text-sm leading-tight text-white">{{ session('message') }}</p>
		</div>
	@endif

	@if(!$user->profileUpdate() || !$user->profilePublished())
		<div class="px-4 py-8 bg-indigo-600 lg:flex lg:items-center lg:justify-between">
			<div class="flex-1 min-w-0">
				<h2 class="text-2xl leading-7 text-white sm:text-3xl sm:leading-9 sm:truncate">
					Get Started
				</h2>
				<div class="flex flex-col mt-1">
					@if(!$user->profileUpdate())
						<div class="flex items-center mt-5 text-base leading-5 text-white">
							<span class="mr-5 material-icons">how_to_reg</span>
							Update Your Profile

							<a href="{{ route('profile.get') }}" class="inline-flex items-center px-10 py-2 ml-auto text-sm font-medium leading-5 text-indigo-600 transition duration-150 ease-in-out bg-white border border-transparent rounded-md shadow-md">
								Start
							</a>
						</div>
					@endif
					@if($user->profileUpdate() && !$user->profilePublished())
						<div class="flex items-center w-full mt-5 text-base leading-5 text-white">
							<span class="mr-5 material-icons">attach_money</span>
							Make Payment

							<a href="{{ route('pay') }}" class="inline-flex items-center px-10 py-2 ml-auto text-sm font-medium leading-5 text-indigo-600 transition duration-150 ease-in-out bg-white border border-transparent rounded-md shadow-md">
								Start
							</a>
						</div>
					@endif
				</div>
			</div>
		</div>
	@endif

	@if(!empty($meetings->toArray()))
		<div class="flex flex-col w-full mt-10 bg-white border divide-y divide-gray-400 rounded-md shadow-lg">
			@foreach ($meetings as $meeting)
				<div>
					@if($meeting->status == 'Accepted')
						<div class="flex items-center px-4 py-3 mt-5 text-sm font-bold bg-green-400 bg-red" role="alert">
							<span class="mr-3 text-white material-icons">verified</span>
							<p class="text-sm leading-tight text-white">Great, Our team will be in touch with you to set the meeting.</p>
						</div>
					@endif
					<div class="flex flex-col w-full px-3 py-5 pb-1">
						<h2 class="text-xl font-semibold text-indigo-600 capitalize">{{ $meeting->adoptee->name }}</h2>
						<p class="mt-2 text-sm font-light text-gray-500">{{ $meeting->adoptee->bio->bio }}</p>
					</div>
					<div class="flex w-full px-3 py-2 mt-3">
						<div class="flex mb-4">
							<span class="mr-2 text-2xl text-gray-400 material-icons">event</span>
							<h2 class="text-base text-gray-400">Expecting Date: {{ $meeting->adoptee->bio->expecting_date }}</h2>
						</div>
						<span class="h-8 px-5 pt-1 ml-auto text-sm text-center text-white @if($meeting->status == 'Accepted' || $meeting->status == 'Complete') bg-green-400 @else bg-red-600  @endif rounded-full align-center">{{ $meeting->status }}</span>
					</div>
					@if($meeting->status == 'Pending')
						<div class="flex w-full px-3 py-2 mt-3">
							<button class="h-8 px-10 py-1 mt-10 mb-5 ml-auto mr-3 text-base text-white bg-indigo-600 rounded-full shadow-md" wire:click="onAccept('{{ $meeting->id }}')">Accept</button>
						</div>
					@endif
				</div>
			@endforeach
		</div>
	@endif
</div>
