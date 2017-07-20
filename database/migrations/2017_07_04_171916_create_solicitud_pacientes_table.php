<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudPacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('solicitud_pacientes', function (Blueprint $table) {
           $table->increments('id');
           $table->string('rut');
           $table->string('nombre_completo');
           $table->date('fecha_nacimiento');
           $table->string('sexo');
           $table->string('direccion');
           $table->string('telefono');
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
        Schema::dropIfExists('solicitud_pacientes');
    }
}
