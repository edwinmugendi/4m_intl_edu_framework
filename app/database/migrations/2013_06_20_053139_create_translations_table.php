<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('translations', function(Blueprint $table) {
			$table->increments('id');
			$table->string('translatable_type');
			$table->integer('translatable_id');
			$table->string('language_code');
			$table->string('title');
			$table->text('content')->nullable();
			$table->text('notes')->nullable();
			$table->integer('created_by_id')->nullable();
			$table->integer('last_updated_by_id')->nullable();
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
		Schema::drop('translations');
	}

}
