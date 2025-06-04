<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Aggiunge la colonna 'orario' alla tabella 'students'.
     */
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('orario')->nullable()->after('codice_fiscale');
        });
    }

    /**
     * Rimuove la colonna 'orario' dalla tabella 'students'.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('orario');
        });
    }
};
