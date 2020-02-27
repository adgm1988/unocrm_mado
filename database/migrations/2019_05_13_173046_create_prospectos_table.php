<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('empresa');
            $table->string('contacto');
            $table->string('telefono');
            $table->string('correo');
            $table->text('involucrados')->nullable();
            $table->date('fecha_estimada')->nullable();
            $table->unsignedInteger('industria');
            $table->unsignedInteger('procedencia');
            $table->unsignedInteger('tipo_proyecto');
            $table->unsignedInteger('estatus_proyecto');
            $table->text('notas')->nullable();
            $table->double('valor');
            $table->unsignedInteger('etapa_id');
            $table->text('estatus');
            $table->unsignedInteger('userid');
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
        Schema::dropIfExists('prospectos');
    }
}
