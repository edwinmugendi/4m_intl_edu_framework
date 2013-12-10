<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivitylogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activitylogs', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('object_type')->nullable();
			$table->string('object_id')->nullable();
			$table->string('action');
			$table->string('detail')->nullable();
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
		Schema::drop('activity_logs');
	}

}
