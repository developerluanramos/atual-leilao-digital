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
        Schema::create('lote', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('descricao');
            $table->foreignUuid('leilao_uuid')->references('uuid')->on('leilao');
            $table->foreignUuid('plano_pagamento_uuid')->references('uuid')->on('plano_pagamento');
            $table->decimal('quantidade', 12, 2); // -- desconsiderar
            $table->decimal('quantidade_macho', 12, 2); // -- desconsiderar
            $table->decimal('quantidade_femea', 12, 2); // -- desconsiderar
            $table->decimal('quantidade_outro', 12, 2); // -- desconsiderar
            $table->decimal('valor_estimado', 12, 2);
            $table->decimal('valor_minimo_prelance', 12, 2);
            $table->boolean('incide_comissao_compra');
            $table->boolean('incide_comissao_venda');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lote');
    }
};
