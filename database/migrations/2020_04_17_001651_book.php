<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Book extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Book', function (Blueprint $table) {
            $table->increments('id');
            $table->string('book_title');
            $table->string('book_description');
            $table->string('book_price');
            $table->string('book_sale')->nullable();

            $table->string('book_numberpage');
            $table->float('book_weight');
            $table->integer('book_releasedate');
            $table->string('book_image');

            $table->integer('views')->nullable();


            $table->integer('id_status')->unsigned();
            $table->foreign('id_status')
                    ->references('id')
                    ->on('status')
                    ->onDelete('cascade');



            $table->integer('id_author')->unsigned();
            $table->foreign('id_author')
                    ->references('id')
                    ->on('author')
                    ->onDelete('cascade');

            

            $table->integer('id_subcategory')->unsigned();
            $table->foreign('id_subcategory')
                    ->references('id')
                    ->on('sub_category')
                    ->onDelete('cascade');

            $table->integer('id_publishinghouse')->unsigned();
            $table->foreign('id_publishinghouse')
                    ->references('id')
                    ->on('publishing_house')
                    ->onDelete('cascade');

            $table->integer('id_bookcompany')->unsigned();
            $table->foreign('id_bookcompany')
                    ->references('id')
                    ->on('Book_company')
                    ->onDelete('cascade');

            $table->integer('id_account')->unsigned();
            $table->foreign('id_account')
                    ->references('id')
                    ->on('Account')
                    ->onDelete('cascade');


        $table->softDeletes();


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
        Schema::dropIfExists('Book');
    }
}
