<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotGlsSchoolTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gls_school', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('gls_id')->unsigned()->index();
			$table->integer('school_id')->unsigned()->index();
			$table->foreign('gls_id')->references('id')->on('gls')->onDelete('cascade');
			$table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
		});

//        $table->engine = 'InnoDB';
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gls_school');
	}

}
