<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ads', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('location_id');
			$table->string('title', 200);
			$table->text('description', 65535);
			$table->string('banner_file_name', 200);
			$table->integer('show_status');
			$table->dateTime('start_date');
			$table->dateTime('end_date');
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
		Schema::drop('ads');
	}

}
