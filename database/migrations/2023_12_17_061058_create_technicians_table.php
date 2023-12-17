<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('technicians', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->unsignedBigInteger('contactnumber');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('skill');
            $table->unsignedInteger('yearsofexperience')->nullable();
            $table->date('dob');
            $table->integer('totaljobs')->default(0);
            $table->string('profilepic')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('technicians');
    }
};
