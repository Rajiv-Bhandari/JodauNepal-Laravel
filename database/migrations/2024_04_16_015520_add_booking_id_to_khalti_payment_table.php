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
        Schema::table('khalti_payment', function (Blueprint $table) {
            // Add booking_id column
            $table->unsignedBigInteger('booking_id')->nullable();

            // Add foreign key constraint
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('khalti_payment', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['booking_id']);

            // Drop booking_id column
            $table->dropColumn('booking_id');
        });
    }
};
