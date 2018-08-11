<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merchant_id');
            $table->string('title', 200);
            $table->string('description', 300);
            $table->datetime('published');
            $table->string('amount', 300);
            $table->integer('no_of_pages');
            $table->time('reading_time');
            $table->string('author_name', 300);
            $table->string('filename', 300);
            $table->string('photo', 300);
            $table->string('isbn', 100);
            $table->string('tags', 300);
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
        Schema::dropIfExists('documents');
    }
}
