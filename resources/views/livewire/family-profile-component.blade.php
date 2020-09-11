<div>
	@if (session()->has('message'))
		<div class="flex items-center px-4 py-3 mt-5 text-sm font-bold text-white bg-red" role="alert">
			<i class="mr-3 text-white far fa-exclamation-triangle"></i>
			<p class="text-sm leading-tight">{{ session('message') }}</p>
		</div>
	@endif

	<div class="flex w-2/3 mx-auto">
		<a href="/home" class="inline-block pt-6 transition-all duration-300 ease-in transform bg-transparent border-0 focus:outline-none hover:-translate-x-2" >
			<span class="mb-5 text-4xl material-icons">keyboard_backspace</span>
		</a>
	</div>

	@if($status == 'Accepted')
		<div class="flex items-center w-2/3 px-4 py-3 mx-auto mt-5 text-sm font-bold bg-green-400 bg-red" role="alert">
			<span class="mr-3 text-white material-icons">verified</span>
			<p class="text-sm leading-tight text-white">Great, Our team will be in touch with you to set the meeting.</p>
		</div>
	@endif
	<div class="w-2/3 mx-auto overflow-hidden bg-white shadow sm:rounded-lg">
		<div class="px-4 py-5 border-b border-gray-200 sm:px-6">
			<h3 class="text-lg font-medium leading-6 text-gray-900">
				Potential Family Details
			</h3>
			<p class="max-w-2xl mt-1 text-sm leading-5 text-gray-500">
				Personal details and an overview of the family.
			</p>
		</div>
		<div>
			<dl>
				<div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
					<dt class="text-sm font-medium leading-5 text-gray-500">
						Our name
					</dt>
					<dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
						{{ $adopter->name }}
					</dd>
				</div>
				<div class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
					<dt class="text-sm font-medium leading-5 text-gray-500">
						About us
					</dt>
					<dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
						{{ $adopter->profile->about_us }}
					</dd>
				</div>
				<div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
					<dt class="text-sm font-medium leading-5 text-gray-500">
						Our home
					</dt>
					<dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
						{{ $adopter->profile->our_home }}
					</dd>
				</div>
				<div class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
					<dt class="text-sm font-medium leading-5 text-gray-500">
						Why are we considering adoption
					</dt>
					<dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
						{{ $adopter->profile->why_adoption }}
					</dd>
				</div>
				<div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
					<dt class="text-sm font-medium leading-5 text-gray-500">
						About
					</dt>
					<dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
						Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.
					</dd>
				</div>
				<div class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
					<dt class="text-sm font-medium leading-5 text-gray-500">
						Photo Album
					</dt>
					<dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
						<ul class="border border-gray-200 rounded-md">
							<li class="flex flex-wrap py-3 pl-3 pr-4 text-sm leading-5">
								@foreach($adopter->profile->photos as $photo)
									<div class="flex w-1/2 p-2">
										<img src="{{ $photo->url }}" alt="" class="w-full h-48 pr-2">
									</div>
								@endforeach
								@empty($adopter->profile->photos->toArray())
									<div class="flex w-1/2 p-2">
										<h2 class="text-base text-gray-900">Album is empty</h2>
									</div>
								@endempty
							</li>
						</ul>
					</dd>
				</div>
				@if($status != null)
					<div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
						<dt class="text-sm font-medium leading-5 text-gray-500">
							Meeting Status
						</dt>
						<dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
							{{ $status }}
						</dd>
					</div>
				@endif
			</dl>
		</div>

		<div class="flex w-full">
			<button class="px-4 py-2 my-4 mt-10 ml-auto mr-5 text-white bg-indigo-600 rounded-full shadow-md btn" @if($status != null) disabled @endif wire:click="onRequestMeeting">
				Request Meeting
			</button>
		</div>
	</div>
</div>
