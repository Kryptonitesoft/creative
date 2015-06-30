<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admissions', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name', 50);
            $table->string('fathers_name', 50);
            $table->string('mothers_name', 50);
            $table->string('schools_name', 70);
            $table->tinyInteger('class', false, true, 2);
            $table->string('version', 10);
            $table->tinyInteger('sroll', false, true, 3);
            $table->string('present_address', 300);
            $table->string('permanent_address', 300);
            $table->dateTime('date_of_birth');
            $table->string('religion', 20);
            $table->string('sex', 10);
            $table->integer('phone', false, true, 11);
            $table->string('email', 100)->nullable();
            $table->string('image', 300)->default("img/male.jpg");
            $table->tinyInteger('package', false, true, 2);
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
		Schema::drop('admissions');
	}

}
