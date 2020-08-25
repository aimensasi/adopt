<div>
	@if (session()->has('message'))
		<div class="alert alert-success">
			{{ session('message') }}
		</div>
	@endif
	<form wire:submit.prevent="update">
		@csrf
		<div class="form-group">
			<label for="why_adoption">Why Adoption</label>
			<textarea class="form-control" id="why_adoption" rows="5" placeholder="Describe why you are looking to adopt..." wire:model="whyAdoption"></textarea>
		</div>

		<div class="form-group">
			<label for="about_us">About Us</label>
			<textarea class="form-control" id="about_us" rows="5" placeholder="Talk about you and your family..." wire:model="aboutUs"></textarea>
		</div>

		<div class="form-group">
			<label for="our_home">Our Home & Community</label>
			<textarea class="form-control" id="our_home" rows="5" placeholder="Describe your home & community..." wire:model="ourHome"></textarea>
		</div>



		<div class="form-group custom-file">
			<label for="photo">Add Photo</label>
			<input type="file" class="form-control-file" id="photo" wire:model="tempPhotos" multiple>
		</div>



		@if ($tempPhotos)
			<div class="card my-3">
				<div class="card-header">Photos To Be Added</div>
				<div class="card-body">
					@foreach ($tempPhotos as $photo)
					<figure class="figure">
						<img src="{{ $photo->temporaryUrl() }}" class="figure-img img-fluid rounded" style="width: 250px;">
						{{-- <figcaption class="figure-caption">A caption for the above image.</figcaption> --}}
					</figure>
					@endforeach
				</div>
			</div>
		@endif


		<div class="card my-3">
			<div class="card-header">Your Photos</div>
			<div class="card-body">
				@if ($photos)
					@foreach ($photos as $photo)
					<figure class="figure">
						<img src="{{ $photo->url }}" class="figure-img img-fluid rounded" style="width: 250px;">
						{{-- <figcaption class="figure-caption">A caption for the above image.</figcaption> --}}
					</figure>
					@endforeach
				@endif
			</div>
		</div>


		<button type="submit" class="btn btn-primary">Update</button>
	</form>
</div>
