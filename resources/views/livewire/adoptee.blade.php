<div>
	@if (session()->has('message'))
		<div class="flex items-center px-4 py-3 mt-5 text-sm font-bold text-white bg-red-400" role="alert">
			<span class="mr-3 text-white material-icons ">error</span>
			<p class="text-sm leading-tight">{{ session('message') }}</p>
		</div>
	@endif
	<form wire:submit.prevent="update" class="mt-10">
		@csrf
		<div class="mb-4">
			<textarea class="text-input border-b border-solid @error('email') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black" id="desc" rows="5" placeholder="Tell us about yourself..." wire:model="bio"></textarea>
			@error('email') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
		</div>

		<div class="mb-4">
			<input type="date" placeholder="Expecting Date..." class="text-input border-b border-solid @error('email') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black" id="expecting-date" value="{{ $date }}" wire:model="date">
		</div>


		<div class="flex justify-center mt-10">
			<button type="submit" class="w-full py-3 text-white bg-indigo-600 focus:outline-none" wire:click="update">Update</button>
		</div>
	</form>
</div>

@push('scripts')
		<script>
			if (document.getElementById("expecting-date")) {
				flatpickr("#expecting-date", {
					altInput: true,
					altFormat: "F j, Y",
					dateFormat: "Y-m-d"
				});
			}
		</script>
@endpush


