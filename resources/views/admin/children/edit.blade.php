@extends('layouts.app')

@section('content')

<div class="w-full mb-32 bg-no-repeat bg-cover" style="height: 500px; background-image: url('https://images.unsplash.com/photo-1518331647614-7a1f04cd34cf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1049&q=80')">
	<div class="w-full h-full pt-40 pl-32 bg-black bg-opacity-75">
		<h2 class="text-4xl font-extrabold leading-10 tracking-tight text-indigo-600 sm:text-5xl sm:leading-none md:text-6xl">
			Child Details
		</h2>
		<p class="pt-5 mt-3 text-base text-justify text-white sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
			Update the personal details of the child listed for adoption
		</p>
	</div>
</div>

<div class="w-1/3 mx-auto">
	@if (session()->has('message'))
		<div class="flex items-center px-4 py-3 mt-5 text-sm font-bold text-white bg-green-400" role="alert">
			<span class="mr-3 text-white material-icons ">done</span>
			<p class="text-sm leading-tight">{{ session('message') }}</p>
		</div>
	@endif


	@if($errors->any())
		<div class="flex items-center px-4 py-3 mt-5 text-sm font-bold text-white bg-red-400" role="alert">
			<span class="mr-3 text-white material-icons ">error</span>
			<p class="text-sm leading-tight">{{ $errors->first() }}</p>
		</div>
	@endif


	<form method="POST" action="{{ route('children.update', $child->id) }}" class="mt-10" enctype="multipart/form-data">
		@csrf
		<div class="mb-4">
			<input type="text" placeholder="Full Name*" name="name" value="{{ $child->name }}"
				class="text-input border-b border-solid @error('name') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">
				@error('name') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
		</div>
		<div class="mb-4">
			<textarea row="5" placeholder="Bio..." name="bio"
				class="text-input border-b border-solid @error('bio') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">{{ $child->bio }}</textarea>
				@error('bio') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
		</div>
		<div class="mb-4">
			<input type="text" placeholder="Age*" name="age" value="{{ $child->age }}"
				class="text-input border-b border-solid @error('age') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">
				@error('age') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
		</div>
		<div class="mb-4">
			<input type="text" placeholder="Nationality*" name="nationality" value="{{ $child->nationality }}"
				class="text-input border-b border-solid @error('nationality') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">
				@error('nationality') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
		</div>
		<div class="mb-4">
			<input type="text" placeholder="Gender*" name="gender" value="{{ $child->gender }}"
				class="text-input border-b border-solid @error('gender') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">
				@error('gender') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
		</div>

		<div class="mb-4">
			<input type="file" placeholder="Picture*" name="picture"
				class="text-input border-b border-solid @error('picture') border-red-400 @else border-gray-400 @enderror w-full px-0 py-2 focus:outline-none focus:border-indigo-600 text-base text-black">
				@error('picture') <p data-cypress="error" class="pt-2 text-sm font-semibold text-red-400">{{ $message }}</p> @enderror
		</div>

		@if ($child->picture)
			<img src="{{ $child->picture }}" alt="" class="h-48">
		@endif



		<div class="flex justify-center mt-10">
			<button type="submit" class="w-full py-3 text-white bg-indigo-600 focus:outline-none">Update</button>
		</div>
	</form>
</div>


<div class="flex flex-col w-2/3 mx-auto mt-12">
	<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
		<div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
			<div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
				<table class="min-w-full divide-y divide-gray-200">
					<thead>
						<tr>
							<th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
								Adopter Name
							</th>
							<th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
								Adopter Phone Number
							</th>
							<th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
								Status
							</th>
							<th class="px-6 py-3 bg-gray-50"></th>
						</tr>
					</thead>
					<tbody class="bg-white divide-y divide-gray-200">
						@foreach ($child->requests as $request)

							<tr>
								<td class="px-6 py-4 whitespace-no-wrap">
									<div class="text-sm font-medium leading-5 text-gray-900">
										{{ $request->adopter->name }}
									</div>
								</td>
								<td class="px-6 py-4 whitespace-no-wrap">
									<div class="text-sm leading-5 text-gray-900">{{ $request->adopter->phone_number }}</div>
								</td>
								<td class="px-6 py-4 whitespace-no-wrap">
									<span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
										{{ $request->status }}
									</span>
								</td>
								<td class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap">
									<a href="{{ route('children.approve', $request->id) }}" class="text-indigo-600 hover:text-indigo-900">Approve</a>
								</td>
								<td class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap">
									<a href="{{ route('children.reject', $request->id) }}" class="text-red-600 hover:text-red-900">Reject</a>
								</td>
							</tr>
						@endforeach

						<!-- More rows... -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
