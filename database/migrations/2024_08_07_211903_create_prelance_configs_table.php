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
            $table->uuid();
            $table->date('data');
            $table->string('cor');
            $table->foreignUuid('leilao_uuid')->references('uuid')->on('leilao');
            $table->foreignUuid('plano_pagamento_uuid')->references('uuid')->on('plano_pagamento');
            $table->decimal('valor_estimado', 12, 2);
            $table->decimal('valor_minimo', 12, 2);
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
