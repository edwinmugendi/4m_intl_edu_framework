<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationConfigTemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notificationconfigtemplates', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('notification_config_id');
			$table->string('language_code');
			$table->string('subject');
			$table->string('template_path');
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
		Schema::drop('notification_config_templates');
	}

}
