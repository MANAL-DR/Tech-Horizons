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
        Schema::create('responsible_proposals', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Titre de l'article
            $table->text('content'); // Contenu de l'article
            $table->foreignId('theme_id')->constrained()->onDelete('cascade'); // Référence au thème
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Référence à l'utilisateur qui a proposé l'article
            $table->enum('status', ['proposé', 'accepté', 'rejeté'])->default('proposé'); // Statut de la proposition
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responsible_proposals');
    }
};