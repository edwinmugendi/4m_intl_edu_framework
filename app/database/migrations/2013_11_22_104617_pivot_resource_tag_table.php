<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotResourceTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resource_tag', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('resource_id')->unsigned()->index();
			$table->integer('tag_id')->unsigned()->index();
			$table->foreign('resource_id')->references('id')->on('resources')->onDelete('cascade');
			$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resource_tag');
	}

}
