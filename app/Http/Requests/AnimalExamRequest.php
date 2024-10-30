<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalExamRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone_number' => 'required|string|max:15',
            'animal_name' => 'required|string|max:255',
            'animal_type' => 'required|string|max:255',
            'fur_color' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'weight' => 'required|numeric',
            'specific_signs' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'exam_date' => 'required|date|before_or_equal:today',
            'bcs' => 'required|integer|min:1|max:5',
            'attitude' => 'required|string|max:255',
            'activity' => 'required|string|max:255',
            'temperature' => 'required|numeric',

            // Aturan untuk setiap pemeriksaan fisik
            'nares' => 'required|in:normal,abnormal',
            'nares_explanation' => 'required_if:nares,abnormal|string|nullable',

            'integument' => 'required|in:normal,abnormal',
            'integument_explanation' => 'required_if:integument,abnormal|string|nullable',

            'eyes' => 'required|in:normal,abnormal',
            'eyes_explanation' => 'required_if:eyes,abnormal|string|nullable',

            'ears' => 'required|in:normal,abnormal',
            'ears_explanation' => 'required_if:ears,abnormal|string|nullable',

            'oral_cavity_teeth_incisor_occlusion' => 'required|in:normal,abnormal',
            'oral_cavity_teeth_incisor_occlusion_explanation' => 'required_if:oral_cavity_teeth_incisor_occlusion,abnormal|string|nullable',

            'oral_cavity_teeth_molar_occlusion' => 'required|in:normal,abnormal',
            'oral_cavity_teeth_molar_occlusion_explanation' => 'required_if:oral_cavity_teeth_molar_occlusion,abnormal|string|nullable',

            'body_condition' => 'required|in:normal,abnormal',
            'body_condition_explanation' => 'required_if:body_condition,abnormal|string|nullable',

            'anus' => 'required|in:normal,abnormal',
            'anus_explanation' => 'required_if:anus,abnormal|string|nullable',

            'abdominal_palpation' => 'required|in:normal,abnormal',
            'abdominal_palpation_explanation' => 'required_if:abdominal_palpation,abnormal|string|nullable',

            'lymph_nodes' => 'required|in:normal,abnormal',
            'lymph_nodes_explanation' => 'required_if:lymph_nodes,abnormal|string|nullable',

            'legs_palation' => 'required|in:normal,abnormal',
            'legs_palation_explanation' => 'required_if:legs_palation,abnormal|string|nullable',

            'legs_range_of_motion' => 'required|in:normal,abnormal',
            'legs_range_of_motion_explanation' => 'required_if:legs_range_of_motion,abnormal|string|nullable',

            'nails' => 'required|in:normal,abnormal',
            'nails_explanation' => 'required_if:nails,abnormal|string|nullable',

            'plantar_surface' => 'required|in:normal,abnormal',
            'plantar_surface_explanation' => 'required_if:plantar_surface,abnormal|string|nullable',

            'awareness_of_surroundings' => 'required|in:normal,abnormal',
            'awareness_of_surroundings_explanation' => 'required_if:awareness_of_surroundings,abnormal|string|nullable',

            'ability_to_move_properly' => 'required|in:normal,abnormal',
            'ability_to_move_properly_explanation' => 'required_if:ability_to_move_properly,abnormal|string|nullable',

            'cardiovascular' => 'required|in:normal,abnormal',
            'cardiovascular_explanation' => 'required_if:cardiovascular,abnormal|string|nullable',

            'respiratory' => 'required|in:normal,abnormal',
            'respiratory_explanation' => 'required_if:respiratory,abnormal|string|nullable',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi.',
            'in' => ':attribute harus bernilai normal atau abnormal.',
            'required_if' => ':attribute diperlukan jika status sebelumnya abnormal.',
        ];
    }

    public function attributes()
    {
        return [
            'nares' => 'Nares',
            'integument' => 'Integument',
            'eyes' => 'Eyes',
            'ears' => 'Ears',
            'oral_cavity_teeth_incisor_occlusion' => 'Oral Cavity ; Teeth ; Incisor Occlusion',
            'oral_cavity_teeth_molar_occlusion' => 'Oral Cavity ; Teeth ; Molar Occlusion',
            'body_condition' => 'Body Condition',
            'anus' => 'Anus',
            'abdominal_palpation' => 'Abdominal Palpation',
            'lymph_nodes' => 'Lymph Nodes',
            'legs_palation' => 'Legs ; Palpation',
            'legs_range_of_motion' => 'Legs ; Range of Motion',
            'nails' => 'Nails',
            'plantar_surface' => 'Plantar Surface',
            'awareness_of_surroundings' => 'Awareness of Surroundings',
            'ability_to_move_properly' => 'Ability to Move Properly',
            'cardiovascular' => 'Cardiovascular',
            'respiratory' => 'Respiratory',
        ];
    }
}
