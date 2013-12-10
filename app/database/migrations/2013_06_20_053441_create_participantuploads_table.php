<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParticipantuploadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('participantuploads', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('file_id');
			$table->integer('user_id');
			$table->integer('gls_cal_id');
			$table->integer('school_id');
            $table->integer('post_id');
			$table->integer('feedback_req_user_id')->nullable();
			$table->datetime('feedback_last_modified')->nullable();
			$table->boolean('shared');
			$table->integer('shared_by_user_id')->nullable();
			$table->integer('shared_by_user_role_id')->nullable();
			$table->datetime('share_last_modified')->nullable();
			$table->integer('translated_by_id')->nullable();
			$table->datetime('last_translated')->nullable();
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
		Schema::drop('participant_uploads');
	}

}
