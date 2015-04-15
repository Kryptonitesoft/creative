<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teachers', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			
            $table->increments('id');
            $table->string('name', 60);
            $table->string('teaches', 100);
            $table->string('education', 100);
            $table->string('description', 300);
            $table->string('image', 300);
            $table->string('email')->unique();
            $table->string('fb', 150);
            $table->tinyInteger('phone', false, true, 11);
            $table->string('cv', 300);
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
		Schema::drop('teachers');
	}

}
