<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusesschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('busesschedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
          
            $table->string('route');
            $table->string('fare');
            $table->string('departure');
            $table->string('arrival');
            

           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('busesschedules');
    }
}
