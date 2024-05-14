<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->unsignedBigInteger('Usuario_id');
            $table->foreign('Usuario_id')->references('id')->on('usuarios'); 
            $table->integer('Cantidad');
            $table->decimal('Total');
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
                Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('compras');
    }
}
