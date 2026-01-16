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
        Schema::create('exercise_student', function (Blueprint $table) {

            $table->foreignId('exercise_id')
                ->constrained('exercices')
                ->cascadeOnDelete();

            $table->foreignId('student_id')
                ->constrained('students')
                ->cascadeOnDelete();

            $table->integer('attempt')->default(1);
            $table->boolean('completed')->default(false);

            $table->timestamps();

            // Empêche les doublons pour un même couple
            $table->primary(['exercise_id', 'student_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_student');
    }
};
