<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();


Route::middleware('auth')->group(function () {

	Route::get('logout', function () {
		Auth::logout();

		return redirect('/');
	});

	Route::get('adopters/{adopter}', 'AdoptersController@show')->name('adopters.show');
	Route::get('adoptee/{adoptee}/meetings/{meeting}', 'AdopteeController@show')->name('adoptees.show');
	Route::get('adoptee/{adoptee}', 'AdopteeController@delete')->name('adoptees.delete');
	Route::get('profile', 'ProfileController@profileShow')->name('profile.get');
	Route::get('pay', 'ProfileController@pay')->name('pay');

	Route::get('adopters', 'AdoptersController@index');
	Route::get('expecting-mothers', 'AdoptersController@expectingMothers');

	Route::get('children', 'ChildrenController@index')->name('children.index');
	Route::get('children/create', 'ChildrenController@create')->name('children.create');
	Route::post('children', 'ChildrenController@store')->name('children.store');
	Route::get('children/{child}', 'ChildrenController@show')->name('children.show');
	Route::get('children/{child}/edit', 'ChildrenController@edit')->name('children.edit');
	Route::post('children/{child}/update', 'ChildrenController@update')->name('children.update');
	Route::get('children/{child}/request', 'ChildrenController@request')->name('children.request');
	Route::get('children/{request}/approve', 'ChildrenController@approve')->name('children.approve');
	Route::get('children/{request}/reject', 'ChildrenController@reject')->name('children.reject');

	Route::resource('child-requests', 'ChildRequests');

	Route::get('/home', 'HomeController@index')->name('home');
});
