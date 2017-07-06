<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_table')->unsigned();
            $table->string('image');
            $table->longText('information');
            $table->enum('status', ['Enabled', 'Disabled'])->default('Enabled');
            $table->string('lang',2);
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
        Schema::dropIfExists('areal_informations');
    }
}
