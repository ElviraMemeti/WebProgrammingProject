<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Faculty;
use App\Models\StudyProgram;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ApplicantController extends Controller
{
    public function index()
    {
        return view('applicants.applicant',[
            'applicants'=> Applicant::all()
        ]);
    }

public function studentRegister()
{
    return view('applicants.studentRegister',[
        'faculties'=> Faculty::all(),
        'studyprograms'=> StudyProgram::all()
    ]);
}

public function store(Request $request)
{
    $formFields= $request->validate([
        'name'=> 'required',
        'lastname'=>'required',
        'studentID'=>['required', Rule::unique('applicants','studentID')],
        'faculty_id'=>'required',
        'programme_id'=>'required',
        'academic_year'=>'required',
        'email'=>['required', 'email'],
        'phone'=>'required',
        'status'=>'required',   
    ]);
    $applicant = Applicant::create($formFields);
    $applicant->faculty()->associate($request->faculty_id);
    $applicant->program()->associate($request->programme_id);
    return redirect('/applicants')->with('message',"Student:  registered successfully!");
}

public function edit(Applicant $applicant)
{
    $teacher = Teachers::find(1);
    dd($teacher->faculty);

    return view('applicants.edit',[
    'applicant'=>$applicant,
    'faculties'=> Faculty::all(),
    'studyprograms'=> StudyProgram::all()

]); 
}


public function update(Request $request, Applicant $applicant)
{
    $formFields= $request->validate([
        'name'=> 'required',
        'lastname'=>'required',
        'studentID'=>'required',
        'faculty_id'=>'required',
        'programme_id'=>'required',
        'academic_year'=>'required',
        'email'=>['required', 'email'],
        'phone'=>'required',
        'status'=>'required',   
    ]);

    $applicant->update($formFields);
    return redirect('/applicants')->with('message', "Student: {$applicant['Name']} updated successfully!");
}


public function destroy(Applicant $applicant)
{
    $applicant->delete();
    return redirect('/applicants')->with('message',"Student: {$applicant['Name']} deleted successfully!");
}
}

