<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotSchoolUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('school_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('school_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('relationship_end')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
//            $table->primary(array('school_id', 'user_id'));
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('school_user');
	}

}
