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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('is_virtual')->default(false);
            $table->unsignedBigInteger('venue_id');
            $table->unsignedBigInteger('organizer_id');
            $table->string('status')->default('concept');
            $table->timestamps();

            // Foreign keys (er moet een venues- en users-tabel zijn)
            $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');
            $table->foreign('organizer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
