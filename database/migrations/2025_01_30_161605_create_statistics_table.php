<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('theme_id')->constrained()->onDelete('cascade'); // Clé étrangère vers themes
            $table->integer('total_articles')->default(0);
            $table->integer('proposals_pending')->default(0);
            $table->integer('proposals_approved')->default(0);
            $table->integer('proposals_rejected')->default(0);
            $table->integer('total_subscribers')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Annuler la migration (supprimer la table).
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
    
