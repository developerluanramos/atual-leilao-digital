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
        Schema::create('compra_cliente', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('compra_uuid')->references('uuid')->on('compra');
            $table->foreignUuid('cliente_uuid')->references('uuid')->on('cliente');
            $table->decimal('cota_percentual', 12, 2)->default(100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compra_cliente');
    }
};
