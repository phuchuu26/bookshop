<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class delivery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery', function (Blueprint $table) {
            $table->increments('id');
            $table->string('delivery_name');
            $table->integer('delivery_telephone');
            $table->string('delivery_provice');
            $table->string('delivery_district');
            $table->string('delivery_ward');
            $table->string('delivery_address');

            $table->integer('id_account')->unsigned();
            $table->foreign('id_account')
                    ->references('id')
                    ->on('account')
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
        Schema::dropIfExists('delivery');
    }
}
