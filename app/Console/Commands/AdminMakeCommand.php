<?php

namespace App\Console\Commands;

use App\Role;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AdminMakeCommand extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'make:admin';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a user with admin privileges access';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {
		$email = $this->ask('Enter admin email?');
		$name = $this->ask('Enter admin name?');
		$password = $this->secret('Enter admin password?');
		$confirmPassword = $this->secret('Confirm password?');


		// Passwords don't match
		if ($password != $confirmPassword) {
			$this->error("Passwords don't match");
			return;
		}

		// Email has error
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) || User::where('email', $email)->count() != 0) {
			$this->error("Email is invalid or has been taken");
			return;
		}

		$role = Role::make(Role::ADMIN);

		$user = User::create([
			'name' => $name,
			'email' => $email,
			'phone_number' => '000000000000',
			'password' => Hash::make($password),
			'role_id' => $role->id,
		]);


		if ($user) {
			$this->info('Admin Has been created successfully.');
		} else {
			$this->error("An error occurred, please try again later");
			return;
		}
	}
}
