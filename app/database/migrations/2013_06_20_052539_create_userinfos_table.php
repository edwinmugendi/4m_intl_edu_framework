<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserInfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userinfos', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
            $table->integer('old_user_id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('screen_name');
            $table->string('preferred_lang_code');
			$table->string('g_cal_id')->nullable();
			$table->string('coach_id')->nullable();
			$table->string('position')->nullable();
			$table->string('user_image')->nullable();
			$table->integer('sort_index')->nullable();
            $table->boolean('enable_share_view')->default(1);
			$table->boolean('enabled')->default(1);
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
		Schema::drop('user_infos');
	}

}
