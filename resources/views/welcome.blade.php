@extends('layouts.app')

@section('content')

<div class="w-full h-screen bg-no-repeat bg-cover" style="background-image: url('https://images.unsplash.com/photo-1561525140-c2a4cc68e4bd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80')">
	<div class="w-full h-full pt-40 pl-32 bg-black bg-opacity-75">
		<h2 class="text-4xl font-extrabold leading-10 tracking-tight text-white sm:text-5xl sm:leading-none md:text-6xl">
			Considering adoption?
			<br class="">
			<span class="text-indigo-700 ">Try Adoptly?</span>
		</h2>
		<p class="pt-5 mt-3 text-base text-justify text-white sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
			We are an agency that connect expectant mothers considering adoption with waiting adoptive families. We have a team of experienced and ethical adoption specialists that ensure that your adoption process is easy and safe.
		</p>


		<div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
			<div class="rounded-md shadow">
				<a href="{{ route('register', ['target' => 1]) }}" class="flex items-center justify-center w-full px-8 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo md:py-4 md:text-lg md:px-10">
					Expected mother
				</a>
			</div>
			<div class="mt-3 sm:mt-0 sm:ml-3">
				<a href="{{ route('register', ['target' => 2]) }}" class="flex items-center justify-center w-full px-8 py-3 text-base font-medium leading-6 text-indigo-700 transition duration-150 ease-in-out bg-indigo-100 border border-transparent rounded-md hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-300 md:py-4 md:text-lg md:px-10">
					Looking to adopt
				</a>
			</div>
		</div>
	</div>
</div>

<div class="p-10 bg-indigo-600" id="about-us">
	<h2 class="text-4xl text-white">About Us</h2>
	<p class="mt-5 text-base text-justify text-white">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor leo nisi, non malesuada tellus pulvinar et. Duis dignissim vehicula nunc. Phasellus dui est, aliquet id dictum vel, vehicula quis leo. Mauris ultricies feugiat faucibus. Vestibulum elementum ac ipsum et dictum. Aliquam mattis sem suscipit bibendum varius. Nulla ornare lorem at ex tincidunt, id ornare elit maximus. Aliquam at sollicitudin augue, sit amet rutrum nulla. Quisque in mattis augue, sit amet viverra sem. Donec id egestas risus. Aenean ipsum mi, ullamcorper ac neque vel, porttitor eleifend nunc. Pellentesque vel dui augue.
		<br/>
		<br/>
		Phasellus volutpat felis a sapien interdum auctor. Aliquam erat volutpat. Aenean placerat est tortor, et ornare dui eleifend at. Praesent ac lacus porttitor, fermentum nisl quis, molestie metus. Etiam nec velit at velit pellentesque hendrerit id vitae lacus. Donec ac ligula pretium, euismod enim et, commodo arcu. Integer vitae dapibus turpis.
		<br/>
		<br/>
		Nullam consequat quis dolor sed molestie. Nulla commodo tortor eget urna fringilla imperdiet. Integer faucibus turpis urna, non eleifend libero egestas eu. Proin consequat tempus eros. Maecenas et lectus commodo, ullamcorper risus ut, cursus magna. Nullam eu nibh sit amet turpis varius convallis sit amet sit amet lectus. Integer ex ex, aliquam dapibus gravida et, ullamcorper ac nulla. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent tempor turpis rutrum felis mattis, non vestibulum risus congue. Sed in turpis sem. Nam viverra mi magna, et tempus magna consequat in. Phasellus egestas rhoncus porttitor. Suspendisse potenti. Maecenas non arcu mi. Sed quis posuere nibh, sed rhoncus tortor. Sed justo massa, elementum eget lacinia sit amet, sagittis sed turpis.
	</p>
</div>


<div class="p-10 bg-white" id="ready">
	<h2 class="text-4xl text-indigo-600">Ready To Adopt?</h2>
	<p class="mt-5 text-base text-justify text-gray-500">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor leo nisi, non malesuada tellus pulvinar et. Duis dignissim vehicula nunc. Phasellus dui est, aliquet id dictum vel, vehicula quis leo. Mauris ultricies feugiat faucibus. Vestibulum elementum ac ipsum et dictum. Aliquam mattis sem suscipit bibendum varius. Nulla ornare lorem at ex tincidunt, id ornare elit maximus. Aliquam at sollicitudin augue, sit amet rutrum nulla. Quisque in mattis augue, sit amet viverra sem. Donec id egestas risus. Aenean ipsum mi, ullamcorper ac neque vel, porttitor eleifend nunc. Pellentesque vel dui augue.
		<br/>
		<br/>
		Phasellus volutpat felis a sapien interdum auctor. Aliquam erat volutpat. Aenean placerat est tortor, et ornare dui eleifend at. Praesent ac lacus porttitor, fermentum nisl quis, molestie metus. Etiam nec velit at velit pellentesque hendrerit id vitae lacus. Donec ac ligula pretium, euismod enim et, commodo arcu. Integer vitae dapibus turpis.
		<br/>
		<br/>
		Nullam consequat quis dolor sed molestie. Nulla commodo tortor eget urna fringilla imperdiet. Integer faucibus turpis urna, non eleifend libero egestas eu. Proin consequat tempus eros. Maecenas et lectus commodo, ullamcorper risus ut, cursus magna. Nullam eu nibh sit amet turpis varius convallis sit amet sit amet lectus. Integer ex ex, aliquam dapibus gravida et, ullamcorper ac nulla. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent tempor turpis rutrum felis mattis, non vestibulum risus congue. Sed in turpis sem. Nam viverra mi magna, et tempus magna consequat in. Phasellus egestas rhoncus porttitor. Suspendisse potenti. Maecenas non arcu mi. Sed quis posuere nibh, sed rhoncus tortor. Sed justo massa, elementum eget lacinia sit amet, sagittis sed turpis.
	</p>
</div>

<div class="p-10 bg-indigo-600" id="considering">
	<h2 class="text-4xl text-white">Considering Adoption?</h2>
	<p class="mt-5 text-base text-justify text-white">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor leo nisi, non malesuada tellus pulvinar et. Duis dignissim vehicula nunc. Phasellus dui est, aliquet id dictum vel, vehicula quis leo. Mauris ultricies feugiat faucibus. Vestibulum elementum ac ipsum et dictum. Aliquam mattis sem suscipit bibendum varius. Nulla ornare lorem at ex tincidunt, id ornare elit maximus. Aliquam at sollicitudin augue, sit amet rutrum nulla. Quisque in mattis augue, sit amet viverra sem. Donec id egestas risus. Aenean ipsum mi, ullamcorper ac neque vel, porttitor eleifend nunc. Pellentesque vel dui augue.
		<br/>
		<br/>
		Phasellus volutpat felis a sapien interdum auctor. Aliquam erat volutpat. Aenean placerat est tortor, et ornare dui eleifend at. Praesent ac lacus porttitor, fermentum nisl quis, molestie metus. Etiam nec velit at velit pellentesque hendrerit id vitae lacus. Donec ac ligula pretium, euismod enim et, commodo arcu. Integer vitae dapibus turpis.
		<br/>
		<br/>
		Nullam consequat quis dolor sed molestie. Nulla commodo tortor eget urna fringilla imperdiet. Integer faucibus turpis urna, non eleifend libero egestas eu. Proin consequat tempus eros. Maecenas et lectus commodo, ullamcorper risus ut, cursus magna. Nullam eu nibh sit amet turpis varius convallis sit amet sit amet lectus. Integer ex ex, aliquam dapibus gravida et, ullamcorper ac nulla. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent tempor turpis rutrum felis mattis, non vestibulum risus congue. Sed in turpis sem. Nam viverra mi magna, et tempus magna consequat in. Phasellus egestas rhoncus porttitor. Suspendisse potenti. Maecenas non arcu mi. Sed quis posuere nibh, sed rhoncus tortor. Sed justo massa, elementum eget lacinia sit amet, sagittis sed turpis.
	</p>
</div>
@endsection
