<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ExamsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('exams')->delete();
 
        $exams = array(
            ['id' => 1, 'title' => 'Physics Class Test', 'subject' => 'Physics', 'class' => 9, 'mark_range' => 100, 'date' => new DateTime, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'title' => 'Chemistry Model Test', 'subject' => 'Chemistry', 'class' => 11, 'mark_range' => 100, 'date' => new DateTime, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'title' => 'Biology Model Test', 'subject' => 'Biology', 'class' => 12, 'mark_range' => 100, 'date' => new DateTime, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        DB::table('exams')->insert($exams);
    }

}