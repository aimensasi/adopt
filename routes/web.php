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
	Route::get('profile', 'ProfileController@profileShow')->name('profile.get');
	Route::get('pay', 'ProfileController@pay')->name('pay');

	Route::get('/home', 'HomeController@index')->name('home');
});
