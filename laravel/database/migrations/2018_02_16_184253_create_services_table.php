<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('service_name', 300);
			$table->string('service_description', 300);
			$table->text('tags');
			$table->integer('merchant_id');
			$table->integer('category_id');
			$table->string('price', 200);
			$table->string('service_photo_image', 300);
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
		Schema::drop('services');
	}

}
