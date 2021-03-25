<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePilonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pilons', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_variedad');
            $table->foreign('codigo_variedad')->references('codigo_variedad')->on('variedads');
            $table->string('codigo_clase');
            $table->foreign('codigo_clase')->references('codigo_clase')->on('tipoclases');
            $table->string('codigo_textura');
            $table->foreign('codigo_textura')->references('codigo_textura')->on('texturas');
            $table->string('codigo_finca');
            $table->foreign('codigo_finca')->references('codigo_finca')->on('fincas');
            $table->foreignId('pilon_id')->constrained('pilons');
            $table->float('peso');
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
        Schema::dropIfExists('detalle_pilons');
    }
}
