<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\BookingStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('technician_id')->constrained();
            $table->foreignId('address_id')->constrained();
            $table->foreignId('technician_timeslot_id')->constrained('techniciantimeslots');
            $table->dateTime('date_time');
            $table->integer('status')->default(BookingStatus::Pending);
            $table->decimal('total_cost', 10, 2)->nullable();
            $table->text('problem_statement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
