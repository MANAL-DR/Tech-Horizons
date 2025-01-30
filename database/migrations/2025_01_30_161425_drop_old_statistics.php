<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécuter la migration (supprimer la table).
     */
    public function up(): void
    {
        Schema::dropIfExists('statistics');
    }

    /**
     * Annuler la migration (restaurer la table si nécessaire).
     */
    public function down(): void
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
};