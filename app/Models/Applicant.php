<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $table='applicants';
    protected $fillable =['name','lastname','studentID','faculty_id','programme_id',
     'academic_year','email','phone', 'status' , 'exams_passed' , 'review' , 'coordinator' ,
      'deansoffice' , 'director' , 'defense' , 'notify' , 'debt' , 'debt_status' , 'transcript' ,
       'presentation1' , 'presentation2' , 'evidence', 'approval' , 'defirstpresentation' , 
       'progresreport' , 'desecondpresentation' , 'gradetranscript' , 'thesis' , 'plagiarism',
        'mentorreport' , 'mr' , 'dissertation', 'record_id'];

     public function faculty(){
        return $this->belongsTo(Faculty::class);

    }
    public function program(){
        return $this->belongsTo(StudyProgram::class,'programme_id');

    }

    public function record(){
        return $this->belongsTo(Record::class);

    }





//    public function scopeFilter($query, array $filters){
//     if ($filters['tag'] ?? false)
//     {
//         $query->where('tags','like','%'.request('tag').'%');
//     }

//     if ($filters['search'] ?? false)
//     {
//         $query->where('title','like','%'.request('search').'%')
//         ->orWhere('description','like','%'.request('search').'%')
//         ->orWhere('tags','like','%'.request('search').'%');
//     }
//    }
}





