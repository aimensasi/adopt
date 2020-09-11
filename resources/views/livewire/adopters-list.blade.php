@foreach ($adopters as $adopter)
	<div class="w-2/3 max-w-sm mx-auto mb-10 shadow-md lg:max-w-full lg:flex">
		<div class="flex-none h-48 overflow-hidden text-center bg-cover rounded-t lg:h-auto lg:w-48 lg:rounded-t-none lg:rounded-l" title="Family"
		@if($url = $adopter->profileImage())
			style="background-image: url('{{ $url }}')">
		@else
			style="background-image: url('https://images.unsplash.com/photo-1531984929664-2fb2be468d3e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80')">
		@endif
		</div>
		<div class="flex flex-col justify-between p-4 leading-normal bg-white border-b border-l border-r border-gray-400 rounded-b lg:border-l-0 lg:border-t lg:border-gray-400 lg:rounded-b-none lg:rounded-r">
			<div class="mb-8">
				<div class="mb-2 text-xl font-bold text-gray-900">{{ $adopter->name }}</div>
				<p class="text-base text-gray-700">{{ \Str::of($adopter->profile->about_us)->limit(140) }}</p>
			</div>
			<div class="flex items-center">
				<a class="ml-auto text-indigo-600 transition-all duration-700 ease-in-out hover:text-indigo-300" href="{{ route('adopters.show', $adopter) }}">View Details</a>
			</div>
		</div>
	</div>
@endforeach
