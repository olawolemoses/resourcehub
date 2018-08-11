<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->integer('document_id');
            $table->integer('fulfilled');
            $table->integer('paid');
            $table->dateTime('order_date');            
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
        Schema::dropIfExists('order_documents');
    }
}
