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
        Schema::create('lance_cliente', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignUuid('leilao_uuid')->references('uuid')->on('leilao');
            $table->foreignUuid('lote_uuid')->references('uuid')->on('lote');
            $table->foreignUuid('lance_uuid')->references('uuid')->on('lance');
            $table->foreignUuid('cliente_uuid')->references('uuid')->on('cliente');
            $table->decimal('cota_percentual', 12)->default(100);
            $table->decimal('cota_real', 12)->default(100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lance_cliente');
    }
};
