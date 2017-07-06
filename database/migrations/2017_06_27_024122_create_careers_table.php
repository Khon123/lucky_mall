<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_table')->unsigned();
            $table->string('job_title');
            $table->longText('job_description')->nullable()->default(null);
            $table->longText('job_requirement')->nullable()->default(null);
            $table->date('post_date')->nullable()->default(null);
            $table->date('close_date')->nullable()->default(null);
            $table->enum('status',['Enabled','Disabled'])->default('Enabled');
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
        Schema::dropIfExists('careers');
    }
}
