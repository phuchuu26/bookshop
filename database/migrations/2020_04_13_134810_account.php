<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Account extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Account', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');

            $table->integer('level')->unsigned();
            $table->foreign('level')
                    ->references('id')
                    ->on('Role')
                    ->onDelete('cascade');

            $table->string('link')->nullable();
            $table->string('status');
            

            $table->rememberToken();
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
        Schema::dropIfExists('Account');
    }
}
