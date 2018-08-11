<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMerchantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('merchants', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('store_name', 200)->unique('store_name');
			$table->string('store_name_url', 200)->unique('store_name_url');
			$table->text('store_about_us');
			$table->text('store_portfolio');
			$table->string('title', 20);
			$table->string('firstname', 100);
			$table->string('lastname', 100);
			$table->string('bvn_mobile_no', 100);
			$table->string('email_address', 200);
			$table->string('street', 200);
			$table->string('city', 200);
			$table->string('state', 200);
			$table->string('country', 200);
			$table->integer('status');
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
		Schema::drop('merchants');
	}

}
