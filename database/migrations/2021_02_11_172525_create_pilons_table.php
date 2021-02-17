<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePilonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilons', function (Blueprint $table) {
            $table->string('codigo_pilon');
            $table->primary('codigo_pilon');
            $table->string('descripcion_pilon');
            $table->date('Fecha_datos_pilones');
            $table->date('fecha_virado_datos_pilones');
            $table->string('codigo_variedad');
            $table->foreign('codigo_variedad')->references('codigo_variedad')->on('variedads');
            $table->string('codigo_clase');
            $table->foreign('codigo_clase')->references('codigo_clase')->on('tipoclases');
            $table->string('codigo_finca');
            $table->foreign('codigo_finca')->references('codigo_finca')->on('fincas');
            $table->string('codigo_ubicacion');
            $table->foreign('codigo_ubicacion')->references('codigo_ubicacion')->on('ubicacions');
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('pilons');
    }
}