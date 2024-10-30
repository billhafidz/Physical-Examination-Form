<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('animal_exams', function (Blueprint $table) {
            $table->string('patient_id')->after('owner_id');
        });
    }

    public function down()
    {
        Schema::table('animal_exams', function (Blueprint $table) {
            $table->dropColumn('patient_id');
        });
    }
};
