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
        Schema::create('propriedades', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('nome');
            $table->string('municipio_localidade');
            $table->string('logradouro');
            $table->string('cep_rural');
            $table->string('numero');
            $table->foreignUuid('cliente_uuid')->references('uuid')->on('cliente')->onDelete('cascade');
            $table->string('telefone_celular');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propriedades');
    }
};
