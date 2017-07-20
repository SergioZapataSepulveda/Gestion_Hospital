<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudAtencionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_atenciones', function (Blueprint $table) {
           $table->increments('id');
           $table->date('fecha_hora_atencion');
           $table->string('paciente_atendido');
           $table->string('medico_a_cargo');
           $table->string('estado');
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
        Schema::dropIfExists('solicitud_atenciones');
    }
}
