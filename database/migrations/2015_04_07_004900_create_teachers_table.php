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
            $table->string('designation', 30)->default("Teacher");
            $table->string('teaches', 50);
            $table->string('education', 100);
            $table->string('description', 300)->nullable();
            $table->string('image', 300)->default("img/male.jpg");
            $table->string('email', 100)->unique()->nullable();
            $table->string('fb', 100)->unique()->nullable();
            $table->integer('phone', false, true, 11)->unique()->nullable();
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
