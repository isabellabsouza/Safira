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
        //mudar tabelas: carrinhos & item_pedidos
        //drop produto_id
        //add estoque_id
        Schema::table('carrinhos', function (Blueprint $table) {
            $table->dropForeign(['produto_id']); // drop the foreign key constraint
            $table->dropColumn('produto_id'); // then drop the column
            $table->unsignedBigInteger('estoque_id');
            $table->foreign('estoque_id')->references('id')->on('estoques');
        });
        
        Schema::table('item_pedidos', function (Blueprint $table) {
            $table->dropForeign(['produto_id']); // drop the foreign key constraint
            $table->dropColumn('produto_id'); // then drop the column
            $table->unsignedBigInteger('estoque_id');
            $table->foreign('estoque_id')->references('id')->on('estoques');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
