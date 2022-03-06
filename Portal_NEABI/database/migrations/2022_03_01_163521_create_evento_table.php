<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nome");
            $table->text("descricao");
            $table->date("data");
            $table->string("categoria");
            $table->string("url");
            $table->string("modo");
            $table->string("organizadores");
            $table->integer("capacidade");
            $table->time("hora_inicio");
            $table->time("hora_termino");
            $table->boolean("status");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evento');
    }
};
