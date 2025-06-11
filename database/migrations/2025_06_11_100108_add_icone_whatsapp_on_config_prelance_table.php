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
        Schema::table('prelance_config', function (Blueprint $table) {
            $table->string('icone_whatsapp')->nullable()->charset('utf8mb4');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prelance_config', function (Blueprint $table) {
            $table->dropColumn('icone_whatsapp');
        });
    }
};
