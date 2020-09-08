<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bill_code')->nullable();
            $table->integer('bill_total');

            $table->string('bill_name');
            $table->integer('bill_phone');
            $table->string('bill_address');
            $table->text('bill_note')->nullable();

            $table->integer('id_status')->unsigned();
            $table->foreign('id_status')
                    ->references('id')
                    ->on('status')
                    ->onDelete('cascade');

            $table->integer('id_payment')->unsigned();
            $table->foreign('id_payment')
                    ->references('id')
                    ->on('payment')
                    ->onDelete('cascade');

            $table->integer('id_account')->unsigned();
            $table->foreign('id_account')
                    ->references('id')
                    ->on('Account')
                    ->onDelete('cascade');


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
        Schema::dropIfExists('bill');
    }
}
