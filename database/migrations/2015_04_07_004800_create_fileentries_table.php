<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileentriesTable extends Migration {

	public function up()
	{
		Schema::create('fileentries', function(Blueprint $table) {
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('filename');
			$table->string('mime');
			$table->string('extension');
			$table->string('type');
			$table->string('title');
			$table->integer('size', false, true);
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
