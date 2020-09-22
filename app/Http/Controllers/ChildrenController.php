<?php

namespace App\Http\Controllers;

use App\Child;
use App\ChildRequest;
use Illuminate\Http\Request;

class ChildrenController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$children = Child::all();

		return view('admin.children.index', compact('children'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('admin.children.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$request->validate([
			'name' => 'required',
			'bio' => 'required',
			'age' => 'required',
			'nationality' => 'required',
			'gender' => 'required',
			'picture' => 'nullable|image',
		]);

		$child = new Child();


		if ($request->picture) {
			$child->picture = $request->file('picture')->store('children');
		}

		$child->name = $request->name;
		$child->age = $request->age;
		$child->bio = $request->bio;
		$child->gender = $request->gender;
		$child->nationality = $request->nationality;

		$child->save();

		return redirect()->route('chidlren.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Child  $child
	 * @return \Illuminate\Http\Response
	 */
	public function show(Child $child) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Child  $child
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Child $child) {
		return view('admin.children.edit', compact('child'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Child  $child
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Child $child) {
		$request->validate([
			'name' => 'required',
			'bio' => 'required',
			'age' => 'required',
			'nationality' => 'required',
			'gender' => 'required',
			'picture' => 'nullable|image',
		]);



		if ($request->picture) {
			$child->picture = $request->file('picture')->store('children');
		}

		$child->name = $request->name;
		$child->age = $request->age;
		$child->bio = $request->bio;
		$child->gender = $request->gender;
		$child->nationality = $request->nationality;

		$child->save();

		return redirect()->back()->with('message', 'Updated successfully.');
	}

	public function request(Child $child) {
		if ($child->requests()->hasRequestFromAdopter()) {
			return redirect()->back()->with('message', 'Request has already been sent.');
		}
		$request = new ChildRequest();

		$request->child_id = $child->id;
		$request->adopter_id = auth()->user()->id;
		$request->status = 'Requested';
		$request->save();

		return redirect()->back()->with('message', 'Request sent, our team will review and get in touch with you.');
	}

	public function approve(ChildRequest $request) {
		$request->status = 'Approve';
		$request->save();

		return redirect()->back()->with('message', 'Adoption Request Approved.');
	}


	public function reject(ChildRequest $request) {
		$request->status = 'Reject';
		$request->save();

		return redirect()->back()->with('message', 'Adoption Request Rejected.');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Child  $child
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Child $child) {
		//
	}
}
