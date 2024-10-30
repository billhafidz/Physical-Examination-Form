<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalExamination extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'animal_exam_id',
        'bcs',
        'attitude',
        'activity',
        'temperature',
        'posture',
        'nares', 
        'nares_explanation', 
        'integument', 
        'integument_explanation', 
        'eyes', 
        'eyes_explanation',
        'ears', 
        'ears_explanation',
        'oral_cavity_teeth_incisor_occlusion', 
        'oral_cavity_teeth_incisor_occlusion_explanation', 
        'oral_cavity_teeth_molar_occlusion', 
        'oral_cavity_teeth_molar_occlusion_explanation', 
        'hydration_status',
        'mucous_membranes',
        'body_condition', 
        'body_condition_explanation',
        'anus', 
        'anus_explanation', 
        'abdominal_palpation', 
        'abdominal_palpation_explanation', 
        'lymph_nodes', 
        'lymph_nodes_explanation', 
        'legs_palation', 
        'legs_palation_explanation', 
        'legs_range_of_motion', 
        'legs_range_of_motion_explanation', 
        'nails', 
        'nails_explanation', 
        'plantar_surface', 
        'plantar_surface_explanation',
        'awareness_of_surroundings',
        'awareness_of_surroundings_explanation',
        'ability_to_move_properly',
        'ability_to_move_properly_explanation', 
        'ectoparasite',
        'endoparasite',
        'cardiovascular', 
        'cardiovascular_explanation',
        'heart_rate',
        'respiratory', 
        'respiratory_explanation', 
        'respiratory_rate',
    ];

    public function AnimalExam()
    {
        return $this->belongsTo(AnimalExam::class, 'animal_exam_id', 'id');
    }
}