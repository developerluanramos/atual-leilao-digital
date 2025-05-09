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
        Schema::create('prelance_config', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->date('data');
            $table->string('cor');
            $table->foreignUuid('leilao_uuid')->references('uuid')->on('leilao')->onDelete('cascade');
            $table->foreignUuid('plano_pagamento_uuid')->references('uuid')->on('plano_pagamento');
            $table->decimal('valor_estimado', 12, 2);
            $table->decimal('valor_minimo', 12, 2);
            $table->decimal('valor_progressao', 12, 2);
            $table->decimal('percentual_comissao_vendedor', 12, 2);
            $table->decimal('percentual_comissao_comprador', 12, 2);
            $table->decimal('percentual_progressao', 12, 2);
            $table->boolean('incide_comissao_vendedor')->default(false);
            $table->boolean('incide_comissao_comprador')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prelance_config');
    }
};
