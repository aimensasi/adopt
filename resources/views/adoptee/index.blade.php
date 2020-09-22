<div class="w-full mb-32 bg-no-repeat bg-cover" style="height: 500px; background-image: url('https://images.unsplash.com/photo-1569073120512-05362a6b92e7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80')">
	<div class="w-full h-full pt-40 pl-32 bg-black bg-opacity-75">
		<h2 class="text-4xl font-extrabold leading-10 tracking-tight text-indigo-600 sm:text-5xl sm:leading-none md:text-6xl">
			Families Looking to adopte
		</h2>
		<p class="pt-5 mt-3 text-base text-justify text-white sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
			This list contain families profile that are looking to adopte
		</p>
	</div>
</div>



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
