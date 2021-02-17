<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleDatoPilonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_dato_pilons', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_detalle');
            $table->float('temperatura');
            $table->string('codigo_datos_pilones');
            $table->foreign('codigo_datos_pilones')->references('codigo_datos_pilones')->on('datos_pilons');
            //$table->foreigncodigo_clase('codigo_clase')->constrained('clases');
            //$table->foreign('codigo_clase')->references('codigo_clase')->on('clases');
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
        Schema::dropIfExists('detalle_dato_pilons');
    }
}
