<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'email',
        'telephone_number',
    ];

    public function Animals()
    {
        return $this->hasMany(AnimalExam::class);
    }
}
