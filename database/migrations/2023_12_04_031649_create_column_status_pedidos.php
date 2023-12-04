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
        Schema::table('pedidos', function (Blueprint $table) {
            $table->enum('status', [
                'Aguardando pagamento',
                'Pagamento confirmado',
                'Em separação',
                'Em transporte',
                'Entregue',
                'Cancelado',
                ])->default('Aguardando pagamento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('column_status_pedidos');
    }
};
