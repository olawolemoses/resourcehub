<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('document_id');
            $table->integer('user_id');
            $table->string('title', 300);
            $table->string('content', 300);
            $table->integer('ratings_score');
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
        Schema::dropIfExists('book_reviews');
    }
}
