<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class info extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('info_name');
            $table->string('info_lastname');
            $table->string('info_email');
            $table->string('info_phone');
            $table->date('info_birth')->nullable();
            $table->string('info_gender')->nullable();
            $table->string('info_address')->nullable();
            $table->string('info_avatar')->nullable();


            $table->integer('id_account')->unsigned();
            $table->foreign('id_account')
                    ->references('id')
                    ->on('Account')
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
        Schema::dropIfExists('info');
    }
}
