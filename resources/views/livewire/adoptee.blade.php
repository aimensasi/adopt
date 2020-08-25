<div>
	@if (session()->has('message'))
		<div class="alert alert-success">
			{{ session('message') }}
		</div>
	@endif
	<form wire:submit.prevent="update">
		@csrf
		<div class="form-group">
			<label for="desc">Tell us about yourself</label>
			<textarea class="form-control" id="desc" rows="5" placeholder="Tell us about yourself..." wire:model="bio"></textarea>
		</div>

		<div class="form-group">
			<label for="expecting-date">When are you expecting?</label>
			<input type="text" id="expecting-date" wire:model="date">
		</div>



		<button type="submit" class="btn btn-primary">Update</button>
	</form>
</div>
