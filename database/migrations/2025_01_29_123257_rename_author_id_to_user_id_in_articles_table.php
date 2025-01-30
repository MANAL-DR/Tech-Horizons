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
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['author_id']); // Drop the foreign key
            $table->renameColumn('author_id', 'user_id'); // Rename the column
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Recreate the foreign key
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop the new foreign key
            $table->renameColumn('user_id', 'author_id'); // Rename back to original
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade'); // Recreate the original foreign key
        });
    }

};
