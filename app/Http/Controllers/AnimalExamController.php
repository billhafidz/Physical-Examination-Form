<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimalExamRequest;
use App\Models\AnimalExam;
use App\Models\Owner;
use App\Models\PhysicalExamination;

class AnimalExamController extends Controller
{
    public function index()
    {
        return view('animalForm');
    }

    public function store(AnimalExamRequest $request)
    {
        $animalExam = AnimalExam::where('patient_id', $request->input('patient_id'))->first();
    
        if ($animalExam) {
            $animalExam->update($request->only([
                'animal_name',
                'animal_type',
                'fur_color',
                'breed',
                'weight',
                'specific_signs',
                'gender',
                'exam_date',
                'doctor',
                'medical_history',
                'anamnesis',
                'diagnosis',
                'further_checkup',
            ]));
        } else {
            $owner = Owner::create($request->only([
                'name',
                'address',
                'email',
                'telephone_number',
            ]));
    
            $animalExam = AnimalExam::create(array_merge($request->only([
                'patient_id',
                'animal_name',
                'animal_type',
                'fur_color',
                'breed',
                'weight',
                'specific_signs',
                'gender',
                'exam_date',
                'doctor',
                'medical_history',
                'anamnesis',
                'diagnosis',
                'further_checkup',
            ]), ['owner_id' => $owner->id]));
        }
    
        $physicalExamData = [
            'animal_exam_id' => $animalExam->id,
            'bcs' => $request['bcs'],
            'attitude' => $request['attitude'],
            'temperature' => $request['temperature'],
            'activity' => $request['activity'],
            'posture' => $request['posture'],
            'hydration_status' => $request['hydration_status'],
            'mucous_membranes' => $request['mucous_membranes'],
            'ectoparasite' => $request['ectoparasite'],
            'endoparasite' => $request['endoparasite'],
            'heart_rate' => $request['heart_rate'],
            'respiratory_rate' => $request['respiratory_rate'],
        ];
    
        $examinations = [
            'nares',
            'integument',
            'eyes',
            'ears',
            'oral_cavity_teeth_incisor_occlusion',
            'oral_cavity_teeth_molar_occlusion',
            'body_condition',
            'anus',
            'abdominal_palpation',
            'lymph_nodes',
            'legs_palation',
            'legs_range_of_motion',
            'nails',
            'plantar_surface',
            'awareness_of_surroundings',
            'ability_to_move_properly',
            'cardiovascular',
            'respiratory',
        ];
    
        foreach ($examinations as $exam) {
            $status = $request->input($exam);
            $explanation = $request->input($exam . '_explanation');
    
            $physicalExamData[$exam] = $status;
            $physicalExamData[$exam . '_explanation'] = ($status === 'abnormal') ? $explanation : null;
        }
    
        $physicalExam = PhysicalExamination::where('animal_exam_id', $animalExam->id)->first();
    
        if ($physicalExam) {
            $physicalExam->update($physicalExamData);
        } else {
            PhysicalExamination::create($physicalExamData);
        }
    
        return redirect()->back()->with('success', 'Data has been saved successfully!');
    }

    public function search($patient_id)
    {
        $animalExams = AnimalExam::with(['Owner', 'PhysicalExamination'])
            ->where('patient_id', $patient_id) 
            ->get();
    
        return response()->json($animalExams);
    }
}
