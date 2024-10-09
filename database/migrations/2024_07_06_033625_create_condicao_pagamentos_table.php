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
        Schema::create('condicao_pagamento', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('descricao');
            $table->decimal('repeticoes', 12, 2);
            $table->decimal('qtd_parcelas', 12, 2);
            $table->decimal('percentual_comissao_vendedor', 12, 2);
            $table->decimal('percentual_comissao_comprador', 12, 2);
            $table->boolean('incide_comissao_vendedor')->default(false);
            $table->boolean('incide_comissao_comprador')->default(false);
            $table->foreignUuid('plano_pagamento_uuid')->references('uuid')->on('plano_pagamento')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('condicao_pagamento');
    }
};
