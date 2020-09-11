
<div class="w-2/3 mx-auto">
	@if(!optional($user->bio)->bio)
		<div class="px-4 py-8 bg-indigo-600 lg:flex lg:items-center lg:justify-between">
			<div class="flex-1 min-w-0">
				<h2 class="text-2xl leading-7 text-white sm:text-3xl sm:leading-9 sm:truncate">
					Get Started
				</h2>
				<div class="flex flex-col mt-1">
					<div class="flex items-center mt-5 text-base leading-5 text-white">
						<span class="mr-5 material-icons">how_to_reg</span>
						Update Your Bio

						<a href="{{ route('profile.get') }}" class="inline-flex items-center px-10 py-2 ml-auto text-sm font-medium leading-5 text-indigo-600 transition duration-150 ease-in-out bg-white border border-transparent rounded-md shadow-md">
							Start
						</a>
					</div>
				</div>
			</div>
		</div>
	@endif
</div>


@if(optional($user->bio)->bio)
	<livewire:adopters-list />
@endif
