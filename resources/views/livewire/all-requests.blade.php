<div class="w-2/3 mx-auto">

	@if (session()->has('message'))
		<div class="flex items-center px-4 py-3 mt-5 text-sm font-bold bg-green-400 bg-red" role="alert">
			<span class="mr-3 text-white material-icons">verified</span>
			<p class="text-sm leading-tight text-white">{{ session('message') }}</p>
		</div>
	@endif


	@if(!empty($meetings->toArray()))
		<div class="flex flex-col w-full mt-10 bg-white border divide-y divide-gray-400 rounded-md shadow-lg">
			@foreach ($meetings as $meeting)
			<div>
					<div class="flex px-4">
						<div class="flex flex-col w-full px-3 py-5 pb-1 mr-24 text-center">
							<h2 class="text-xl font-semibold text-indigo-600 capitalize">{{ $meeting->adoptee->name }}</h2>
							<p class="mt-2 text-sm font-light text-gray-500">{{ $meeting->adoptee->phone_number}}</p>
							<p class="mt-2 text-sm font-light text-gray-500">{{ $meeting->adoptee->email}}</p>
						</div>
						<div class="flex m-auto">
							<span class="p-2 text-5xl text-indigo-600 border-2 border-indigo-600 rounded-full material-icons">compare_arrows</span>
						</div>
						<div class="flex flex-col w-full px-3 py-5 pb-1 ml-24 text-center">
							<h2 class="text-xl font-semibold text-indigo-600 capitalize">{{ $meeting->adopter->name }}</h2>
							<p class="mt-2 text-sm font-light text-gray-500">{{ $meeting->adopter->phone_number}}</p>
							<p class="mt-2 text-sm font-light text-gray-500">{{ $meeting->adopter->email}}</p>
						</div>
					</div>
					<div class="flex w-full">
						<span class="h-8 px-5 pt-1 m-auto text-sm text-center text-white @if($meeting->status == 'Complete') bg-green-400 @elseif($meeting->status == 'Reject') bg-red-600 @else bg-indigo-600  @endif rounded-full align-center">{{ $meeting->status }}</span>
					</div>
					<div class="flex my-3">
						<button wire:click="onComplete('{{ $meeting->id }}')" class="px-4 py-2 my-4 mt-10 ml-auto mr-5 text-white bg-green-400 rounded-full shadow-md btn" @if($meeting->status == 'Complete' || $meeting->status == 'Reject') disabled @endif>
							Match Complete
						</button>
						<button wire:click="onReject('{{ $meeting->id }}')" class="px-4 py-2 my-4 mt-10 ml-5 mr-auto text-white bg-red-400 rounded-full shadow-md btn" @if($meeting->status == 'Complete' || $meeting->status == 'Reject') disabled @endif>
							Match Rejected
						</button>
					</div>
				</div>
			@endforeach
		</div>
	@endif
</div>
