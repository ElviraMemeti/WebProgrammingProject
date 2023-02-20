<?php

namespace App\Models;

use App\Models\Faculty;

use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Applicant extends Model
{
    use HasFactory;
    protected $table='applicants';
    protected $fillable =['name','lastname','studentID','faculty_id','programme_id',
     'academic_year','email','phone', 'status' , 'exams_passed' , 'review' , 'coordinator' ,
      'deansoffice' , 'director' , 'defense' , 'notify' , 'debt' , 'debt_status' , 'transcript' ,
       'presentation1' , 'presentation2' , 'evidence', 'approval' , 'defirstpresentation' ,
       'progresreport' , 'desecondpresentation' , 'gradetranscript' , 'thesis' , 'plagiarism',
        'mentorreport' , 'mr' , 'dissertation', 'record_id' , 'presentationtick1' , 'presentationtick2'];

     public function faculty(){
        return $this->belongsTo(Faculty::class);

    }
    public function program(){
        return $this->belongsTo(StudyProgram::class,'programme_id');

    }



    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('studentID', 'like', '%' . $filters['search'] . '%')
                  ->orWhere(function($subquery) use ($filters) {
                      $subquery->whereExists(function($query) use ($filters) {
                          $query->select(DB::raw(1))
                                ->from('faculties')
                                ->whereRaw('faculties.id = applicants.faculty_id')
                                ->where('faculties.name', 'like', '%' . $filters['search'] . '%');
                      });
                  });
        }
    }
    
 
    


    public function changeStatusToGraduated(Request $request, $id)
    {
        // Get the applicant record from the database based on the applicant ID
        $applicant = Applicant::find($id);


        if ($applicant) {
            // Check if all checkboxes are checked
            if ($request->review == "on" && $request->deansoffice == "on" && $request->director == "on" && $request->defense == "on" && $request->notify == "on") {
                // Update the status field to "graduated"
                $applicant->status = "graduated";
                $applicant->save();
            }
        }
    }





}





