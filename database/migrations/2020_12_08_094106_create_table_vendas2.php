<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableVendas2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas2', function (Blueprint $table) {
            $table->id();
            $table->string('valor');
            $table->integer('id_cliente');
            $table->string('tipo_pg');
            $table->string('status');
            $table->string('parcelas');
            $table->string('data_faturas');
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
        Schema::dropIfExists('vendas2');
    }
}
