<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('results', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			
            $table->increments('id');
            $table->tinyInteger('sroll', false, true, 3);
            $table->string('name', 40);
            $table->tinyInteger('mark', false, true, 3);
            $table->float('gpa');
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
	}

}
