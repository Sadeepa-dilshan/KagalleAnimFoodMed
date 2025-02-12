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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('species'); // e.g., Dog, Cat, Bird
            $table->string('breed')->nullable(); // Optional
            $table->enum('age_group', ['Puppy', 'Adult', 'Senior'])->nullable(); // Fixed values
            $table->text('health_status')->nullable(); // Stores health conditions
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
