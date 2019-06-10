<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('catering_service_id')->unsigned();
            $table->foreign('catering_service_id')->references('id')->on('catering_services');
            $table->string('menu_name');
            $table->text('menu_image');
            $table->bigInteger('menu_type_id')->unsigned();
            $table->foreign('menu_type_id')->references('id')->on('menu_type');
            $table->double('menu_price',15,2);
            $table->string('weekday');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
