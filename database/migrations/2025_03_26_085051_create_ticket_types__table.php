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
        Schema::create('ticket_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('tickets_id');
            $table->string('name');
            $table->float('price');
            $table->integer('quantity');
            $table->timestamp('sales_start')->nullable();
            $table->timestamp('sales_end')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            // Foreign key
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('tickets_id')->references('id')->on('tickets')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_types_');
    }
};
