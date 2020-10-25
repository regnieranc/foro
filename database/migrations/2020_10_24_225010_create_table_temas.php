<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTemas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tema');
            $table->string('path_url')->unique();
            $table->string('descripcion');
            $table->integer('estado');//0 cerrado, 1 abierto, 2 fijo
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('subcategoria_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias');
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
        Schema::dropIfExists('temas');
    }
}
