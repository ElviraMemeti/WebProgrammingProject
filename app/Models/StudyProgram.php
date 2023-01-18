<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyProgram extends Model
{
    use HasFactory;

    protected $table='study_programs';
    protected $fillable =['name'];

    public function applicants(){
        return $this->hasMany(Applicant::class);
    }
    public function faculty(){
        return $this->belongsTo(Faculty::class);

    }
}
