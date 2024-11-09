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
        Schema::create('lote_vendedor', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('cliente_uuid')->references('uuid')->on('cliente');
            $table->foreignUuid('lote_uuid')->references('uuid')->on('lote');;
            $table->decimal('percentual_cota', 12, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lote_vendedor');
    }
};
