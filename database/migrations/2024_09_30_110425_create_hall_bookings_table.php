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
        Schema::create('hall_bookings', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('section');
            $table->unsignedBigInteger('hall');
            $table->time('time_from');
            $table->time('time_to');
            $table->text('remarks')->nullable();

            // Assuming 'hall' is a foreign key referencing the halls table
            $table->foreign('hall')->references('id')->on('halls')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hall_bookings');
    }
};
