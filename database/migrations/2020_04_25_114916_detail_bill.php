<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetailBill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_bill', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qty');

           
            
            $table->integer('id_bill')->unsigned();
            $table->foreign('id_bill')
                    ->references('id')
                    ->on('bill')
                    ->onDelete('cascade');

            $table->integer('id_book')->unsigned();
            $table->foreign('id_book')
                    ->references('id')
                    ->on('book')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_bill');
    }
}
