<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('animal_exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained()->onDelete('cascade');
            $table->string('animal_name');
            $table->string('animal_type');
            $table->string('fur_color');
            $table->string('breed');
            $table->decimal('weight', 8, 2);
            $table->string('specific_signs');
            $table->string('gender');
            $table->dateTime('exam_date');
            $table->string('doctor');
            $table->text('medical_history')->nullable();
            $table->text('anamnesis')->nullable();
            $table->text('diagnosis');
            $table->text('further_checkup');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('animal_exams');
    }
};
