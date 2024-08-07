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
        Schema::create('leilao', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('denominacao');
            $table->string('descricao');
            $table->string('local');
            $table->string('cep');
            $table->string('uf');
            $table->string('cidade');
            $table->dateTime('aberto_em');
            $table->dateTime('fechado_em');
            $table->dateTime('prelance_aberto_em');
            $table->dateTime('prelance_fechado_em');
            $table->foreignUuid('promotor_uuid')->references('uuid')->on('promotor');
            $table->foreignUuid('leiloeiro_uuid')->references('uuid')->on('leiloeiro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leilao');
    }
};
