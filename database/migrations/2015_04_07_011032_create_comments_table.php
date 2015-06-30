<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			
            $table->increments('id');
            $table->text('body');
            $table->string('name', 50);
            $table->string('email', 100);
            $table->integer('post_id', false, true);
            $table->timestamps();

			$table->foreign('post_id')->references('id')->on('posts')
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

		Schema::table('comments', function(Blueprint $table) {
			$table->dropForeign('comments_post_id_foreign');
		});

		Schema::drop('comments');
	}

}
