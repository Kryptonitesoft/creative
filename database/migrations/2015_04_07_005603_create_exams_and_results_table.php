<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsAndResultsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exams', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			
            $table->increments('id');
            $table->string('title', 50);
            $table->string('subject', 30);
            $table->tinyInteger('class', false, true, 2)->unsigned();
            $table->tinyInteger('mark_range', false, true, 3)->unsigned();
            $table->dateTime('date');
            $table->timestamps();
        });


        Schema::create('results', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			
            $table->increments('id');
            $table->tinyInteger('sroll', false, true)->length(3);
            $table->string('name', 40);
            $table->tinyInteger('mark', false, true)->length(3);
            $table->integer('exam_id', false, true);
            $table->timestamps();

			$table->foreign('exam_id')->references('id')->on('exams')
				->onDelete('cascade');
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

		Schema::table('results', function(Blueprint $table) {
			$table->dropForeign('results_exam_id_foreign');
		});	

		Schema::drop('results');

		Schema::drop('exams');
	}

}
