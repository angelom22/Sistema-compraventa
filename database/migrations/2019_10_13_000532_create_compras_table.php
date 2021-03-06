<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('idproveedor')->unsigned();
            $table->integer('idusuario')->unsigned();
            $table->string('tipo_identificacion',20);
            $table->string('num_compra',10);
            $table->dateTime('fecha_compra');
            $table->integer('impuesto')->unsigned();
            $table->decimal('total',65,2);
            $table->integer('estado')->unsigned();;
            $table->timestamps();
            
            $table->foreign('idproveedor')->references('id')->on('proveedores');
            $table->foreign('idusuario')->references('id')->on('users');
            $table->foreign('impuesto')->references('id')->on('impuesto');
            $table->foreign('estado')->references('id_estado_factura')->on('estado_facturas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
