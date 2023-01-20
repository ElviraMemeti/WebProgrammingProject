<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Faculty;
use App\Models\StudyProgram;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
    $formFields['debt']=rand(0,1);
    $formFields['exams_passed']=rand(1,10);
    $applicant = Applicant::create($formFields);
    $applicant->faculty()->associate($request->faculty_id);
    $applicant->program()->associate($request->programme_id);
    return redirect('/applicants')->with('message',"Student:  registered successfully!");
}

public function edit(Applicant $applicant)
{
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

public function studentprogres(Applicant $applicant)
{
    $teacher = Teachers::where("faculty_id" , $applicant->faculty_id)->first();

    return view('applicants.studentprogres',[
        'applicant'=> $applicant , 
        'teacher'=> $teacher
    ]);
}
public function updatestudentprogres(Request $request , Applicant $applicant){
    
    $request->validate([
        'file' => 'mimes:docx,doc|max:2048',
    ]);
    $fileName = $request->file->getClientOriginalName();
    $filePath = $applicant->name.'-'.$applicant->studentID.'/'.$fileName;
    $path = Storage::disk('public')->put($filePath, file_get_contents($request->file));
    $path = Storage::disk('public')->url($path);
}
}

