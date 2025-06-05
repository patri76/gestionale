<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Esegui la migrazione.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            // Campi anagrafici
            $table->string('nome');
            $table->string('cognome');
            $table->date('data_nascita')->nullable();
            $table->string('nazionalita')->nullable();

            // Contatti
            $table->string('email');
            $table->string('telefono');

            // Dati passaporto
            $table->string('numero_passaporto')->nullable();
            $table->date('data_rilascio_passaporto')->nullable();

            // Indirizzi
            $table->string('indirizzo_italia')->nullable();
            $table->string('indirizzo_estero')->nullable();

            // Codice fiscale e consensi
            $table->string('codice_fiscale')->nullable();
            $table->boolean('consenso_privacy')->default(false);
            $table->boolean('consenso_marketing')->default(false);

            // Associazione a classe
            $table->foreignId('classe_id')->nullable()->constrained('classes')->onDelete('set null');

            // Dati didattici
            $table->string('livello')->nullable();  // Es: A1, B2, C1
            $table->string('orario')->nullable();   // Es: 09:00, 11:00, 19:00

            $table->timestamps();
        });
    }

    /**
     * Annulla la migrazione.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
