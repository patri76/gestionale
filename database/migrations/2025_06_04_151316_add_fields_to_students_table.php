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
        Schema::table('students', function (Blueprint $table) {
            $table->string('email');
            $table->string('telefono');
            $table->string('numero_passaporto')->nullable();
            $table->date('rilascio_passaporto')->nullable();
            $table->string('indirizzo_italia')->nullable();
            $table->string('indirizzo_estero')->nullable();
            $table->boolean('consenso_privacy')->default(false);
            $table->boolean('consenso_marketing')->default(false);
            $table->string('codice_fiscale')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn([
                'email',
                'telefono',
                'numero_passaporto',
                'rilascio_passaporto',
                'indirizzo_italia',
                'indirizzo_estero',
                'consenso_privacy',
                'consenso_marketing',
                'codice_fiscale',
            ]);
        });
    }
};
