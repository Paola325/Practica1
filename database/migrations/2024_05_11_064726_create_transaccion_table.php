<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id();
            $table->text('voucher')->nullable();
            $table->integer('calificacion')->nullable();
            $table->bigInteger('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->bigInteger('producto_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->boolean('valida')->default(false);
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
        Schema::dropIfExists('transaccion');
    }
}
