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
        Schema::create('lote_item', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->decimal('quantidade', 12, 2);
            $table->string('quantidade_macho');
            $table->string('quantidade_femea');
            $table->string('quantidade_outros');
            $table->string('descricao');
            // - colunas repetidas do leilão (iremos tirar essa duvida ainda)
            $table->foreignUuid('plano_pagamento_uuid')->references('uuid')->on('plano_pagamento');
            $table->foreignUuid('condicao_pagamento_uuid')
                ->references('uuid')->on('condicao_pagamento');
            $table->foreignUuid('leilao_uuid')->references('uuid')->on('leilao');
            $table->uuid('reca_uuid')->unsigned();
            $table->uuid('especie_uuid')->unsigned();
            $table->decimal('valor', 12, 2);
            $table->boolean('inside_comissao_compra');
            $table->boolean('incide_comissao_venda');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lote_items');
    }
};
