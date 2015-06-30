<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileentriesTable extends Migration {

	public function up()
	{
		Schema::create('fileentries', function(Blueprint $table) {
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('link', 300);
			$table->string('type', 15);
			$table->string('title', 50);
			$table->integer('size', false, true)->nullable()->default(0);
			$table->string('description', 300)->nullable();
			$table->boolean('isVisible')->nullable()->default(0);
			$table->smallInteger('views', false, true)->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fileentries');
	}

}
