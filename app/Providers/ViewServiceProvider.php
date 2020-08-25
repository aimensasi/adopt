<?php

namespace App\Providers;

use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider {
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot() {
		View::composer('*', function ($view) {
			if (Auth::check()) {
				$view->with('user', Auth::user());
				$view->with('isAdopter', auth()->user()->hasRole(Role::ADOPTER));
			}
		});

		Blade::if('adopter', function () {
			return auth()->user()->hasRole(Role::ADOPTER);
		});
	}
}
