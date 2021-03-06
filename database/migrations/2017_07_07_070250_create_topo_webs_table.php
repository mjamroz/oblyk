<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopoWebsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topo_webs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('crag_id')->unsigned();
            $table->string('label', 255);
            $table->string('url', 255);
            $table->timestamps();

            //clé étrangère
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('crag_id')->references('id')->on('crags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('topo_webs');
    }
}
