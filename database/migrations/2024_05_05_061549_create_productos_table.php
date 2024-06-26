<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('estado',['Propuesto','Consignado','Rechazado'])->default('propuesto');
            $table->date('fecha_publicacion');
            $table->string('motivo')->nullable()->default(null);
            $table->text('descripcion');
            $table->double('precio');
            $table->integer('cantidad');
            $table->bigInteger('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->bigInteger('propietario_id')->unsigned();
            $table->foreign('propietario_id')->references('id')->on('usuarios');
            $table->timestamps();
        });

        // Volver a activar las restricciones de clave externa
        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Desactivar temporalmente las restricciones de clave externa
        //Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('productos');
    }
}
