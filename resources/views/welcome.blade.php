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
		Adoptly is a web application that endeavors to provide institutionalized children and unplanned, at-risk newborn babies the joy and safety of growing up in a family. No child should be denied family life because of circumstances.
		<br/>
		The idea for Adoptly started as a way to increase accessibility for expecting mothers to qualified adoptive parents in a safe and private platform online that speeds up the adoption process. While also providing children with a way to find a safe and loving home, reducing the high numbers of children living in institutions.
		<br/>
		We work closely with the non-profit foundation OrphanCare who work closely with the Ministry of Women, Family and Community Development and the Department of Social Welfare and are partners with Lumos, an international non-profit organization that advises nations about deinstitutionalization (DI), to implement the transition from institutional care to family based care.
		With the connections from OrphanCare we are able to work with institutions to provide children the opportunity for adoption by making them available online so as to reduce the long and cumbersome task of attempting to adopt a child in the traditional process.
		Our aim is to provide a safe, secure and private platform for families who are searching for adoption opportunities and for expecting mothers who are looking for a safe haven for their about to be born babies.
	</p>
</div>


<div class="p-10 bg-white" id="ready">
	<h2 class="text-4xl text-indigo-600">Ready To Adopt?</h2>
	<p class="mt-5 text-base text-justify text-gray-500">
		Adoptive Parent Resources
		Many resources are available recommended for adoptive parents. We have agents to guide you through the entire process of child adoption and to answer any queries you may have. This includes providing advice in financial aspects, legal aspects, preparation for adoption resources
		Pregnant and Considering Adoption?
		We have numerous sources to assist you in preparing for adoption including personal consultations and legal advice. We are here to help you and your privacy is of utmost importance to us.
		The Basics of Legal and Ethical Adoption
		We work to ensure that all adoptions are carried out in a legal manner under the Malaysian law on child adoption. The two main child adoption laws in Malaysia are the Adoption Act of 1952 for non-Muslim adoptions, and the Registration of Adoption Act 1952 for both Muslims and Non-Muslims. We provide basic principles on ethical child adoption to avoid unhappy parents and to protect a child’s future.
	</p>
	<p class="mt-5 text-base text-justify text-gray-500">Contact: amal@gmail.com for more information on the topics covered by Adoptly Team.</p>
</div>

<div class="p-10 bg-indigo-600" id="considering">
	<h2 class="text-4xl text-white">Considering Adoption?</h2>
	<p class="mt-5 text-base text-justify text-white">
		Adoptly is emerging as a community of adoption professionals committed to ethical and compassionate adoptions, many of whom are frustrated by the “big business” aspect of adoption.  We’re hard at work to spread the word about how Adoptly is connecting like-minded people who understand the importance of child-centered adoptions.
		Questioning yourself about the adoption process? Do not worry! Adoptly is here to guide and assist you in every step of the way. Consultations will help you answer all your questions that you have been pondering about.
		Do check out our services available for you and do remember child adoption is a process designated to provide a child with a safe, loving home, something that everyone has the right to no matter where in the world.
		Thank you for taking the time to learn about Adoptly!
	</p>
</div>
@endsection
