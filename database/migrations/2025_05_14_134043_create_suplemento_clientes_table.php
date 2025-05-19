<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuplementoClientesTable extends Migration
{
    public function up()
    {
        Schema::create('suplemento_clientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->string('classificacao_treino'); // Iniciante, Intermediário, Avançado
            $table->string('tempo_academia');       // Ex: 2 meses, 1 ano
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('suplemento_clientes');
    }
}

