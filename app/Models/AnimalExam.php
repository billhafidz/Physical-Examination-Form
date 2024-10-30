<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id', 
        'patient_id',
        'animal_type', 
        'animal_name', 
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
    ];

    public function Owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function PhysicalExamination()
    {
        return $this->hasOne(PhysicalExamination::class, 'animal_exam_id', 'id');
    }
}
