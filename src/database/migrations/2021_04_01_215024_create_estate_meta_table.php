<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstateMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('estate_meta', function (Blueprint $table) {
        //     $table->increments('id')->unsigned();
        //     $table->integer('meta_id')->unsigned();
        //     $table->integer('estate_id')->unsigned();
        //     $table->timestamps();
        //     $table->engine = 'InnoDB';
        //     $table->foreign('meta_id')->references('id')->on('meta');
        //     $table->foreign('estate_id')->references('id')->on('estates');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estate_meta');
    }
}
