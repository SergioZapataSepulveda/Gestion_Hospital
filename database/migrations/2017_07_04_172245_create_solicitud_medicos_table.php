<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_medicos', function (Blueprint $table) {
           $table->increments('id');
           $table->string('rut');
           $table->string('nombre_completo');
           $table->date('fecha_contratacion');
           $table->string('especialidad');
           $table->integer('valor_consulta');
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
        Schema::dropIfExists('solicitud_medicos');
    }
}
