<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('file_uploads', function (Blueprint $table) {
            $table->id();
            $table->string('model_type'); // Ex: 'Leilao' ou 'Cliente'
            $table->uuid('model_uuid'); // ID do model
            $table->string('file_path'); // Caminho do arquivo
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('file_uploads');
    }
};