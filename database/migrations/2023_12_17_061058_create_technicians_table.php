<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\TechnicianStatus;

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
            $table->unsignedBigInteger('skill_id'); 
            $table->unsignedInteger('yearsofexperience')->nullable();
            $table->date('dob');
            $table->integer('totaljobs')->default(0);
            $table->string('profilepic')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('skill_id')->references('id')->on('categories'); // Foreign key reference to categories table
            $table->integer('status')->default(TechnicianStatus::Pending);
            $table->text('rejectmessage')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('technicians', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['skill_id']);
        });

        Schema::dropIfExists('technicians');
    }
};
