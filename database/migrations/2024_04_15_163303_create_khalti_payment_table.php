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
        Schema::create('khalti_payment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('amount_in_paisa');
            $table->string('idx')->unique();
            $table->string('mobile');
            $table->string('product_identity');
            $table->string('product_name');
            $table->string('product_url');
            $table->string('token');
            $table->string('widget_id');
            $table->unsignedBigInteger('paid_by');
            $table->unsignedBigInteger('paid_to');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('paid_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('paid_to')->references('id')->on('technicians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khalti_payment');
    }
};
