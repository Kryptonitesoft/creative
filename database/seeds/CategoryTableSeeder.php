<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
    	DB::table('category_post')->delete();
    	DB::table('categories')->delete();
 
        $categories = array(
            ['id' => 1, 'name' => 'Biology'                      , 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Physics'                      , 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'Chemistry'                    , 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'name' => 'Mathematics'                  , 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'name' => 'ICT'                          , 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'name' => 'English'                      , 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 7, 'name' => 'Bangla'                       , 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 8, 'name' => 'General Science'              , 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 9, 'name' => 'BGS'                          , 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' =>10, 'name' => 'Accounting'                   , 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' =>11, 'name' => 'Introduction to Business'     , 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' =>12, 'name' => 'Finance and Banking'          , 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' =>13, 'name' => 'Personal'                     , 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' =>14, 'name' => 'Other'                        , 'created_at' => new DateTime, 'updated_at' => new DateTime]
        );
 
        DB::table('categories')->insert($categories);
    }
}
