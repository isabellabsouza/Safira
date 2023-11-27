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
        Schema::create('detalhes_pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->string('sobrenome', 255);
            $table->foreignId('pedido_id')->constrained();
            $table->foreignId('endereco_id')->constrained();
            $table->string('telefone', 255);
            $table->string('cpf', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalhes_pedidos');
    }
};
