<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class AdmissionsTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        DB::table('admissions')->delete();
		
		$admissions = array(
			[
		    	'name'				=> "Nazibur Rahman",
		    	'fathers_name'		=> "Md. Mostafizur Rahman",
		    	'mothers_name'		=> "Sabina Yesmin",
		    	'schools_name'		=> "Abdullah Memorial High School",
		    	'class'				=> 7,
		    	'version'			=> "Bangla",
		    	'sroll'				=> "42",
		    	'present_address'	=> "Baunia, Turag, Dhaka-1230",
		    	'permanent_address'	=> "Baunia, Turag, Dhaka-1230",
		    	'date_of_birth'		=> new DateTime,
		    	'sex'				=> "Male",
		    	'religion'			=> "Islam",
		    	'phone'				=> 1916608496,
		    	'email'				=> "rockeromi@hotmail.com",
		    	'package'			=> 1
			],
			[
		    	'name'				=> "Nazibur Rahman",
		    	'fathers_name'		=> "Md. Mostafizur Rahman",
		    	'mothers_name'		=> "Sabina Yesmin",
		    	'schools_name'		=> "Abdullah Memorial High School",
		    	'class'				=> 7,
		    	'version'			=> "Bangla",
		    	'sroll'				=> "42",
		    	'present_address'	=> "Baunia, Turag, Dhaka-1230",
		    	'permanent_address'	=> "Baunia, Turag, Dhaka-1230",
		    	'date_of_birth'		=> new DateTime,
		    	'sex'				=> "Male",
		    	'religion'			=> "Islam",
		    	'phone'				=> 1916608497,
		    	'email'				=> "rockeromi2@hotmail.com",
		    	'package'			=> 2
			],
			[
		    	'name'				=> "Nazibur Rahman",
		    	'fathers_name'		=> "Md. Mostafizur Rahman",
		    	'mothers_name'		=> "Sabina Yesmin",
		    	'schools_name'		=> "Abdullah Memorial High School",
		    	'class'				=> 7,
		    	'version'			=> "Bangla",
		    	'sroll'				=> "42",
		    	'present_address'	=> "Baunia, Turag, Dhaka-1230",
		    	'permanent_address'	=> "Baunia, Turag, Dhaka-1230",
		    	'date_of_birth'		=> new DateTime,
		    	'sex'				=> "Male",
		    	'religion'			=> "Islam",
		    	'phone'				=> 1916608498,
		    	'email'				=> "rockeromi3@hotmail.com",
		    	'package'			=> 3
			]
		);

        DB::table('admissions')->insert($admissions);
    }

}