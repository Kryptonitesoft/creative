<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			
            $table->increments('id');
            $table->string('title', 100);
            $table->text('body');
            $table->string('slug', 150);
            $table->smallInteger('views', false, true);
            $table->smallInteger('comment_count', false, true);
            $table->integer('author_id', false, true);
            $table->integer('archive_id', false, true);
            $table->timestamps();

			$table->foreign('author_id')->references('id')->on('teachers')
				->onDelete('restrict')
				->onUpdate('restrict');

			$table->foreign('archive_id')->references('id')->on('archives')
				->onDelete('restrict')
				->onUpdate('restrict');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_author_id_foreign');
			$table->dropForeign('posts_archive_id_foreign');
		});	

		Schema::drop('posts');
	}

}
