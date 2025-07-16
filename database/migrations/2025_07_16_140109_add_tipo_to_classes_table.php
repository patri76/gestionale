<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Aggiunge la colonna 'tipo' alla tabella 'classes'
     */
    public function up(): void
    {
        Schema::table('classes', function (Blueprint $table) {
            if (!Schema::hasColumn('classes', 'tipo')) {
                $table->string('tipo')->default('gruppo')->after('attiva'); // 'gruppo' o 'privata'
            }
        });
    }

    /**
     * Rimuove la colonna 'tipo' dalla tabella 'classes'
     */
    public function down(): void
    {
        Schema::table('classes', function (Blueprint $table) {
            if (Schema::hasColumn('classes', 'tipo')) {
                $table->dropColumn('tipo');
            }
        });
    }
};
