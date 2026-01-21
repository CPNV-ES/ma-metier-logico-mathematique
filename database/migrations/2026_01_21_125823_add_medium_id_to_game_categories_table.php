<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('game_categories', function (Blueprint $table) {
            $table->foreignId('medium_id')
                ->nullable()
                ->after('name')
                ->constrained('media')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('game_categories', function (Blueprint $table) {
            $table->dropConstrainedForeignId('medium_id');
        });
    }
};
