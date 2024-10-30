<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyAnimalExamsColumnsToText extends Migration
{
    public function up()
    {
        Schema::table('animal_exams', function (Blueprint $table) {
            $table->text('medical_history')->nullable()->change();
            $table->text('anamnesis')->nullable()->change();
            $table->text('diagnosis')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('animal_exams', function (Blueprint $table) {
            $table->longText('medical_history')->nullable()->change();
            $table->longText('anamnesis')->nullable()->change();
            $table->longText('diagnosis')->nullable()->change();
        });
    }
}