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
        Schema::create('compra', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignUuid(column: 'leilao_uuid')->references('uuid')->on('leilao');
            $table->foreignUuid(column: 'cliente_uuid')->references('uuid')->on('cliente');
            $table->foreignUuid('lote_uuid')->references('uuid')->on('lote');
            $table->foreignUuid('plano_pagamento_uuid')->references('uuid')->on('plano_pagamento');
            $table->decimal('valor', 12, 2);
            $table->decimal('valor_comissao_vendedor', 12, 2);
            $table->decimal('valor_comissao_comprador', 12, 2);
            $table->decimal('percentual_cota', 12, 2)->default(100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compra');
    }
};
