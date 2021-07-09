<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentroVacunacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centro_vacunacions', function (Blueprint $table) {
            $table->id();
            $table->string('center_name');
            $table->string('center_adress');
            $table->integer('center_phone');
            $table->string('center_area');
            $table->string('center_timetable');
            $table->string('latitud');
            $table->string('longitud');
            $table->binary('imagen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('centro_vacunacions');
    }
}
