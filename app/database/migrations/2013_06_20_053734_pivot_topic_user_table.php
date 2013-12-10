<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotTopicUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('topic_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('topic_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('relationship_end')->nullable();

            $table->engine = 'InnoDB';
//            $table->primary(array('topic_id', 'user_id'));
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('topic_user');
	}

}
