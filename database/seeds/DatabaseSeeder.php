<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		$this->call('FileEntriesTableSeeder');
		$this->call('TeachersTableSeeder');
		$this->call('ExamsTableSeeder');
		$this->call('ResultsTableSeeder');
		$this->call('AdmissionsTableSeeder');
		$this->call('CategoryTableSeeder');
		$this->call('PostTableSeeder');
		$this->call('UserTableSeeder');
	}

}
