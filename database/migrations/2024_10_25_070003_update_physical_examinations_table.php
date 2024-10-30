<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePhysicalExaminationsTable extends Migration
{
    public function up()
    {
        Schema::table('physical_examinations', function (Blueprint $table) {
            $table->dropColumn('explanation');

            $table->string('nares_explanation')->nullable()->after('nares');
            $table->string('integument_explanation')->nullable()->after('integument');
            $table->string('eyes_explanation')->nullable()->after('eyes');
            $table->string('ears_explanation')->nullable()->after('ears');
            $table->string('oral_cavity_teeth_incisor_occlusion_explanation')->nullable()->after('oral_cavity_teeth_incisor_occlusion');
            $table->string('oral_cavity_teeth_molar_occlusion_explanation')->nullable()->after('oral_cavity_teeth_molar_occlusion');
            $table->string('anus_explanation')->nullable()->after('anus');
            $table->string('abdominal_palpation_explanation')->nullable()->after('abdominal_palpation');
            $table->string('lymph_nodes_explanation')->nullable()->after('lymph_nodes');
            $table->string('legs_palation_explanation')->nullable()->after('legs_palation');
            $table->string('legs_range_of_motion_explanation')->nullable()->after('legs_range_of_motion');
            $table->string('nails_explanation')->nullable()->after('nails');
            $table->string('plantar_surface_explanation')->nullable()->after('plantar_surface');
            $table->string('awareness_of_surroundings_explanation')->nullable()->after('awareness_of_surroundings');
            $table->string('ability_to_move_properly_explanation')->nullable()->after('ability_to_move_properly');
            $table->string('cardiovascular_explanation')->nullable()->after('cardiovascular');
            $table->string('respiratory_explanation')->nullable()->after('respiratory');
        });
    }

    public function down()
    {
        Schema::table('physical_examinations', function (Blueprint $table) {
            $table->string('explanation')->nullable();

            $table->dropColumn([
                'nares_explanation',
                'integument_explanation',
                'eyes_explanation',
                'ears_explanation',
                'oral_cavity_teeth_incisor_occlusion_explanation',
                'oral_cavity_teeth_molar_occlusion_explanation',
                'anus_explanation',
                'abdominal_palpation_explanation',
                'lymph_nodes_explanation',
                'legs_palation_explanation',
                'legs_range_of_motion_explanation',
                'nails_explanation',
                'plantar_surface_explanation',
                'awareness_of_surroundings_explanation',
                'ability_to_move_properly_explanation',
                'cardiovascular_explanation',
                'respiratory_explanation',
            ]);
        });
    }
};
