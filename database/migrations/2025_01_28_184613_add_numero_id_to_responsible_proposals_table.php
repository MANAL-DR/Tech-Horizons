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
        Schema::table('responsible_proposals', function (Blueprint $table) {
            $table->foreignId('numeros_id')->nullable()->constrained('numeros')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('responsible_proposals', function (Blueprint $table) {
            $table->dropForeign(['numero_id']);

            $table->dropColumn('numero_id');
        });
    }
};
