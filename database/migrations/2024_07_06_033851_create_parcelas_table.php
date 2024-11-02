<?php

use App\Enums\StatusParcelaEnum;
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
        Schema::create('parcela', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->integer('numero');
            $table->foreignUuid('compra_uuid')->references('uuid')->on('compra');
            $table->foreignUuid('cliente_uuid')->references('uuid')->on('cliente');
            $table->foreignUuid(column: 'leilao_uuid')->references('uuid')->on('leilao');
            $table->foreignUuid('lote_uuid')->references('uuid')->on('lote');
            $table->date('vencimento_em');
            $table->decimal('valor', 12, 2);
            $table->decimal('valor_comissao_vendedor', 12, 2);
            $table->decimal('valor_comissao_comprador', 12, 2);
            $table->decimal('percentual_comissao_vendedor', 12, 2);
            $table->decimal('percentual_comissao_comprador', 12, 2);
            $table->boolean('incide_comissao_venda')->default(false);
            $table->boolean('incide_comissao_compra')->default(false);
            $table->integer('repeticoes')->default(1);
            $table->enum('status', StatusParcelaEnum::getValues())->default(StatusParcelaEnum::ABERTO);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcela');
    }
};
