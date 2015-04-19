<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ExamsTableSeeder extends Seeder {

    public function run()
    {
         DB::table('exams')->delete();
 
        $exams = array(
            ['id' => 1, 'title' => 'Exam 1', 'subject' => 'Statistics', 'class' => 'B.Sc.(engg) - 25', 'mark_range' => 100, 'date' => new DateTime, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'title' => 'Exam 2', 'subject' => 'VLSI', 'class' => 'B.Sc.(engg) - 25,26', 'mark_range' => 100, 'date' => new DateTime, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'title' => 'Exam 3', 'subject' => 'Higher Math', 'class' => 'Intermediate-(XII)', 'mark_range' => 100, 'date' => new DateTime, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        DB::table('exams')->insert($exams);
    }

}