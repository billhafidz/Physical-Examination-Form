<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHeartRateToPhysicalExaminationsTable extends Migration
{
    public function up()
    {
        Schema::table('physical_examinations', function (Blueprint $table) {
            $table->decimal('heart_rate', 5, 2)->after('cardiovascular_explanation');
        });
    }

    public function down()
    {
        Schema::table('physical_examinations', function (Blueprint $table) {
            $table->dropColumn('heart_rate');
        });
    }
}