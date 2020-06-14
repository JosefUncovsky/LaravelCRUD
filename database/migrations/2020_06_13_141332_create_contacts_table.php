<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // Schema::enableForeignKeyConstraints();
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('interpret');
            $table->string('genre');
            $table->integer('release_year');
            $table->string('obal');

        });
        Schema::create('contacts', function (Blueprint $table){
            $table->string('obal');
        });

       // Schema::create('contacts', function (Blueprint $table){
         //   $table->string('name');
       // });
        //Schema::create('contacts', function (Blueprint $table){
       //     $table->string('interpret');
       // });
      //  Schema::create('contacts', function (Blueprint $table){
      //      $table->string('genre');
      //  });
      //  Schema::create('contacts', function (Blueprint $table){
      //      $table->integer('release_year');
      //  });


     //   Schema::enableForeignKeyConstraints();
     //   Schema::create('cd_genre', function (Blueprint $table) {
     //       $table->string('cd_genre');

     //       $table->foreign('cd_genre')->references('genre')->on('contacts');
     //       $table->onDelete('cascade');

      //  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
