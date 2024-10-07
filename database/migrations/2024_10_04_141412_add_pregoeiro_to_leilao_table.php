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
        Schema::table('leilao', function (Blueprint $table) {
            $table->foreignUuid('pregoeiro_uuid')->references('uuid')->on('pregoeiro')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leilao', function (Blueprint $table) {
            $table->dropColumn('pregoeiro_uuid');
        });
    }
};
