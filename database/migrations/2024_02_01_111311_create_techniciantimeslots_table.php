<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('techniciantimeslots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('technician_id');
            $table->integer('day');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('technician_id')->references('id')->on('technicians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('techniciantimeslots');
    }
};
