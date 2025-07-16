<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('classes', function (Blueprint $table) {
            if (!Schema::hasColumn('classes', 'codice_corso')) {
                $table->string('codice_corso')->nullable()->after('nome');
            }
            if (!Schema::hasColumn('classes', 'livello')) {
                $table->string('livello')->nullable()->after('codice_corso');
            }
            if (!Schema::hasColumn('classes', 'orario')) {
                $table->string('orario')->nullable()->after('livello');
            }
            if (!Schema::hasColumn('classes', 'inizio')) {
                $table->date('inizio')->nullable()->after('orario');
            }
            if (!Schema::hasColumn('classes', 'fine')) {
                $table->date('fine')->nullable()->after('inizio');
            }
            if (!Schema::hasColumn('classes', 'insegnante_id')) {
                $table->unsignedBigInteger('insegnante_id')->nullable()->after('tipo');
                $table->foreign('insegnante_id')->references('id')->on('users')->onDelete('set null');
            }
        });
    }

    public function down(): void
    {
        Schema::table('classes', function (Blueprint $table) {
            if (Schema::hasColumn('classes', 'insegnante_id')) {
                $table->dropForeign(['insegnante_id']);
                $table->dropColumn('insegnante_id');
            }
            $table->dropColumn([
                'codice_corso',
                'livello',
                'orario',
                'inizio',
                'fine',
            ]);
        });
    }
};
