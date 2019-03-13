<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('label');
            $table->string('group');
            $table->integer('branch_id')->unsigned();
            $table->string('codice_interno');
            $table->integer('locked');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('group')->references('slug')->on('meta_groups');
            $table->foreign('branch_id')->references('id')->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meta');
    }
}
