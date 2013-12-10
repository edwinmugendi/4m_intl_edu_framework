<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotGlsUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gls_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('gls_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('gls_id')->references('id')->on('gls')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('relationship_end')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->engine = 'InnoDB';
//            $table->primary(array('gls_id', 'user_id'));
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gls_user');
	}

}
