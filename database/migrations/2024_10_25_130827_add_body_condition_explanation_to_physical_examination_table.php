<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBodyConditionExplanationToPhysicalExaminationTable extends Migration
{
    public function up()
    {
        Schema::table('physical_examinations', function (Blueprint $table) {
            $table->string('body_condition_explanation')->nullable()->after('body_condition'); 
        });
    }

    public function down()
    {
        Schema::table('physical_examinations', function (Blueprint $table) {
            $table->dropColumn('body_condition_explanation'); 
        });
    }
}