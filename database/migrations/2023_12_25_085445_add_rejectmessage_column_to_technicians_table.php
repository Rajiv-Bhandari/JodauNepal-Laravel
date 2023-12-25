<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRejectmessageColumnToTechniciansTable extends Migration
{
    public function up()
    {
        Schema::table('technicians', function (Blueprint $table) {
            $table->text('rejectmessage')->nullable()->after('status');
        });
    }

    public function down()
    {
        Schema::table('technicians', function (Blueprint $table) {
            $table->dropColumn('rejectmessage');
        });
    }
}
