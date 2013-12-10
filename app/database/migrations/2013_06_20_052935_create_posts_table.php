<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('topic_id');
            $table->integer('created_by_id');
            $table->integer('created_by_group_id');  // to differenciate between posts by EmerateVPs vs Participants.
			$table->integer('translated_by_id')->nullable();
			$table->datetime('last_translated')->nullable();
			$table->string('translation_comment')->nullable();
			$table->timestamps();
            $table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
