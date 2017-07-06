<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageSubMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_sub_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id')->unsigned();
            $table->integer('sub_menu_id')->unsigned();
            $table->integer('id_table')->unsigned();
            $table->string('image');
            $table->string('caption')->nullable()->default(null);
            $table->enum('status', ['Enabled', 'Disabled'])->default('Enabled');
            $table->string('lang', 2);
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
        Schema::dropIfExists('image_sub_menus');
    }
}
