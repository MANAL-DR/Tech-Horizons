<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn('publication_date'); // Supprime la colonne publication_date
        });
    }
    
    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->timestamp('publication_date')->nullable(); // Si tu veux restaurer la colonne
        });
    }
};
