<?php namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UserCreate extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'user:create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a admin user';


	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$name = $this->ask('What is your name?');
		$email = $this->ask('And What is your email address?');
		$password = $this->secret('Please enter your secret password');

		$user = new User();
		$user->name = $name;
		$user->email = $email;
		$user->role = 'admin';
		$user->password = bcrypt($password);
		$user->save();

		$this->info('User created successfully!');
	}

}
