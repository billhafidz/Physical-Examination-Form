<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('physical_examinations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('animal_exam_id')->constrained()->onDelete('cascade');
        $table->integer('bcs'); 
        $table->string('attitude');
        $table->string('activity');
        $table->decimal('temperature', 5, 2); 
        $table->string('posture');
        $table->string('nares');
        $table->string('integument');
        $table->string('eyes');
        $table->string('ears');
        $table->string('oral_cavity_teeth_incisor_occlusion');
        $table->string('oral_cavity_teeth_molar_occlusion');
        $table->string('hydration_status'); 
        $table->string('mucous_membranes');
        $table->string('body_condition');
        $table->string('anus');
        $table->string('abdominal_palpation');
        $table->string('lymph_nodes');
        $table->string('legs_palation');
        $table->string('legs_range_of_motion');
        $table->string('nails');
        $table->string('plantar_surface');
        $table->string('awareness_of_surroundings');
        $table->string('ability_to_move_properly');
        $table->string('ectoparasite')->nullable(); 
        $table->string('endoparasite')->nullable(); 
        $table->string('cardiovascular');
        $table->string('respiratory');
        $table->decimal('respiratory_rate', 5, 2); 
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('physical_examinations');
}
};
