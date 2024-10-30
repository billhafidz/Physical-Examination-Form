<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveExamTypeAndStatusFromPhysicalExaminationsTable extends Migration
{
    public function up()
    {
        Schema::table('physical_examinations', function (Blueprint $table) {
            $table->dropColumn(['exam_type', 'status']);
        });
    }

    public function down()
    {
        Schema::table('physical_examinations', function (Blueprint $table) {
            $table->string('exam_type')->nullable();
            $table->string('status')->nullable();
        });
    }
};
