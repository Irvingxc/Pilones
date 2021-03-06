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
            $table->id();
            $table->string('codigo_pilon');
            $table->string('descripcion_pilon');
            $table->date('Fecha_datos_pilones')->nullable();
            $table->float('peso');
            $table->date('Fecha_empilonamiento');
         //   $table->date('fecha_virado_datos_pilones');
            $table->foreignId('ubicacion')->constrained('ubicacions');
            $table->foreignId('sucursal_id')->constrained('procedencias');
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
