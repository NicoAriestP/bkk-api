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
        Schema::create('questionnaire_answers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('created_by')
                ->nullable()
                ->constrained('students')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('students')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreignId('question_id')
                ->nullable()
                ->constrained('questionnaire_questions')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreignId('question_option_id')
                ->nullable()
                ->constrained('question_options')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->text('text_answer')->nullable();
            $table->tinyInteger('is_selected')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaire_answers');
    }
};
