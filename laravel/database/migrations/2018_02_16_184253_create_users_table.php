<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_type');
			$table->string('username', 200);
			$table->string('password', 200);
			$table->dateTime('last_login')->nullable();
			$table->string('remember_token', 200)->nullable();
			$table->json('settings')->nullable();
			$table->string('linkedin_id', 200)->virtualAs("JSON_VALUE(settings, '$.linkedin_id')");
			$table->string('google_id', 200)->virtualAs("JSON_VALUE(settings, '$.google_id')");
			$table->timestamps();
			$table->index('linkedin_id', "user_linkedin_id");
			$table->index('google_id', "user_google_id");
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
