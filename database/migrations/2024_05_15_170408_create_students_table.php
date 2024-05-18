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
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreignId('kelas_id')
                ->nullable()
                ->constrained('kelas')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->string('name', 50);
            $table->string('nisn', 50);
            $table->string('phone', 20);
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->date('born_date');
            $table->string('height', 5);
            $table->string('weight', 5);
            $table->string('province', 50);
            $table->string('city', 50);
            $table->text('address');
            $table->tinyInteger('is_graduated')->default(0);
            $table->tinyInteger('is_married')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
