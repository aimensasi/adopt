<div>
	@if (session()->has('message'))
		<div class="alert alert-success">
			{{ session('message') }}
		</div>
	@endif

	<form wire:submit.prevent="update">
		@csrf
		<div class="mb-4">
			<textarea class="text-input border-b border-solid @error('email') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black" id="desc" rows="5" placeholder="Write about why you are considering adoption..." wire:model="whyAdoption"></textarea>
			@error('email') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
		</div>

		<div class="mb-4">
			<textarea class="text-input border-b border-solid @error('email') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black" id="desc" rows="5" placeholder="Write about your family..." wire:model="aboutUs"></textarea>
			@error('email') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
		</div>

		<div class="mb-4">
			<textarea class="text-input border-b border-solid @error('email') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black" id="desc" rows="5" placeholder="Write about your home..." wire:model="ourHome"></textarea>
			@error('email') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
		</div>



		<div class="flex w-full mt-8" x-data="{}">
			<h2 class="text-base">Add Photos To Your Album</h2>
			<button type="button" class="h-10 px-10 py-1 ml-auto mr-3 text-base text-white bg-indigo-600 rounded-full shadow-md" @click="$refs.file.click()">
				<span class="material-icons">cloud_upload</span>
			</button>
			<input type="file" class="hidden" id="photo" wire:model="tempPhotos" multiple x-ref="file">
		</div>



		@if ($tempPhotos)
			<ul class="mt-10 border border-gray-200 rounded-md">
				<li class="flex flex-wrap py-3 pl-3 pr-4 text-sm leading-5">
				@foreach ($tempPhotos as $photo)
					<div class="flex w-1/2 p-2">
						<img src="{{ $photo->temporaryUrl() }}" alt="" class="w-full h-48 pr-2">
					</div>
					@endforeach
				</li>
			</ul>
		@endif


		@if ($photos)
			<ul class="mt-10 border border-gray-200 rounded-md">
				<li class="flex flex-wrap py-3 pl-3 pr-4 text-sm leading-5">
				@foreach ($photos as $photo)
					<div class="flex w-1/2 p-2">
						<img src="{{ $photo->url }}" alt="" class="w-full h-48 pr-2">
					</div>
					@endforeach
				</li>
			</ul>
		@endif

		<div class="flex justify-center mt-10">
			<button type="submit" class="w-full py-3 text-white bg-indigo-600 focus:outline-none">Update</button>
		</div>
	</form>
</div>
