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
        Schema::create('lance', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignUuid('leilao_uuid')->references('uuid')->on('leilao');
            $table->foreignUuid('lote_uuid')->references('uuid')->on('lote');
            $table->foreignUuid('plano_pagamento_uuid')->references('uuid')->on('plano_pagamento');
            $table->foreignUuid('prelance_config_uuid')->references('uuid')->on('prelance_config');
            $table->date('realizado_em');
            $table->decimal('valor', 12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lance');
    }
};
