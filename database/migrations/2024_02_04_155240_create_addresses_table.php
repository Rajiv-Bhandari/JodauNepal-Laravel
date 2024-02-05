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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Foreign key reference to the users table
            $table->string('street');
            $table->string('state');
            $table->string('city');
            $table->string('country');
            $table->string('contact_number');
            $table->string('alt_contact_number')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('address_name'); // Home or Office
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
