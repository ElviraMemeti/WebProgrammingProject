<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $table='faculties';
    protected $fillable =['name'];

    public function applicants(){
        return $this->hasMany(Applicant::class);
    }
    
    public function programs(){
        return $this->hasMany(StudyProgram::class);

    }

    public function teachers(){
        return $this->hasMany(Teachers::class);

    }
}
