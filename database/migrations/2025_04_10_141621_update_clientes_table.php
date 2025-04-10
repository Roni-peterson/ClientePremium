<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->string('cpf')->unique()->after('id');
            $table->string('nome');
            $table->string('email');
            $table->string('telefone');
            $table->date('data_nascimento')->nullable();
            $table->enum('genero', ['masculino', 'feminino', 'outros', 'não informar'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
