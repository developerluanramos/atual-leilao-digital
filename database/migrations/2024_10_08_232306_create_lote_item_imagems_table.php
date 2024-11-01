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
        Schema::create('lote_item_imagem', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignUuid('lote_item_uuid')->references('uuid')->on('lote_item');
            $table->string('descricao');
            $table->string('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lote_item_imagem');
    }
};
