<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ResultsTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('results')->delete();
 
        $results = array(
            ['id' => 1, 'sroll' => 1, 'name' => 'Sabbir', 'mark' => 70, 'exam_id' => '1', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'sroll' => 2, 'name' => 'Joynal', 'mark' => 70, 'exam_id' => '1', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'sroll' => 3, 'name' => 'Mehedi', 'mark' => 70, 'exam_id' => '1', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'sroll' => 4, 'name' => 'Shakhawat', 'mark' => 70, 'exam_id' => '1', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'sroll' => 5, 'name' => 'Dolon', 'mark' => 70, 'exam_id' => '1', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'sroll' => 6, 'name' => 'Raj', 'mark' => 70, 'exam_id' => '1', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 7, 'sroll' => 1, 'name' => 'Eti', 'mark' => 70, 'exam_id' => '2', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 8, 'sroll' => 3, 'name' => 'Shama', 'mark' => 70, 'exam_id' => '2', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 9, 'sroll' => 5, 'name' => 'Shamim', 'mark' => 70, 'exam_id' => '3', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 10, 'sroll' => 6, 'name' => 'Sadekul', 'mark' => 70, 'exam_id' => '2', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 11, 'sroll' => 7, 'name' => 'Ashraful', 'mark' => 70, 'exam_id' => '2', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 12, 'sroll' => 2, 'name' => 'Tarikul', 'mark' => 70, 'exam_id' => '2', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 13, 'sroll' => 4, 'name' => 'Saddam', 'mark' => 70, 'exam_id' => '3', 'created_at' => new DateTime, 'updated_at' => new DateTime],

            );
 
        
        DB::table('results')->insert($results);
    }

}