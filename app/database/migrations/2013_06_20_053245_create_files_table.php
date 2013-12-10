<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('files', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('size');
            $table->string('extention');
            $table->string('type')->integer();
			$table->string('original_name');
			$table->string('path');
			$table->integer('created_by_id');
			$table->integer('last_modified_by_id')->nullable();
			$table->integer('uploadable_id');
			$table->string('uploadable_type');
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
		Schema::drop('files');
	}

}
