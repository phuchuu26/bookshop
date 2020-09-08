<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Evaluate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('evaluate_title');
            $table->string('evaluate_content');


            $table->integer('id_account')->unsigned();
            $table->foreign('id_account')
                    ->references('id')
                    ->on('book')
                    ->onDelete('cascade');

            $table->integer('id_status')->unsigned();
            $table->foreign('id_status')
                    ->references('id')
                    ->on('status')
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
        Schema::dropIfExists('evaluate');
    }
}
