<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('menu_type_name');
        });

        $array = [
            ['menu_type_name' => 'Pokok'],
            ['menu_type_name' => 'Daging'],
            ['menu_type_name' => 'Lauk'],
            ['menu_type_name' => 'Sayur'],
            ['menu_type_name' => 'Buah'],
            ['menu_type_name' => 'Snack'],
            ['menu_type_name' => 'Kue/Manis'],
            ['menu_type_name' => 'Minuman'],
            ['menu_type_name' => 'Lain-Lain']
        ];

        DB::table('menu_type')->insert(
            $array
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_type');
    }
}
