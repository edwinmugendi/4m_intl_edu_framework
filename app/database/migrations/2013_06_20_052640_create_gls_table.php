<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGlsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gls', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('cal_id')->nullable();
			$table->date('start_date');
			$table->date('end_date');
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
		Schema::drop('gls');
	}

}
