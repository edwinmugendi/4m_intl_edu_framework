<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTopicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('topics', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('discussion_id');
			$table->string('admin_notes')->nullable();
            $table->integer('created_by_id');
            $table->integer('last_updated_by_id')->nullable();
			$table->timestamps();
            $table->softDeletes();
//            $table->foreign('discussion_id')->references('id')->on('discussions')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('topics');
	}

}
