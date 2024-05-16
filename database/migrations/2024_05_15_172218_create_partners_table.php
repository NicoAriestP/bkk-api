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
        Schema::create('partners', function (Blueprint $table) {
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

            $table->string('name', 50);
            $table->string('phone', 20);
            $table->string('email')->unique();
            $table->string('password');
            $table->text('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
