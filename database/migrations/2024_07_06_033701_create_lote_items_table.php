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
            $table->uuid()->unique();
            $table->enum('genero', \App\Enums\GeneroLoteItemEnum::getValues());
            $table->string('descricao');
            $table->foreignUuid('lote_uuid')->references('uuid')->on('lote')->onDelete('cascade');
            $table->uuid('raca_uuid');
            $table->uuid('especie_uuid');
            $table->decimal('valor_estimado', 12, 2)->default(0);
            
            $table->string('observacoes', 1500);
            $table->string('codigo_identificacao')->nullable();
            $table->string('cor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lote_item');
    }
};
