<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Faculty;
use App\Models\StudyProgram;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use function GuzzleHttp\Promise\all;

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
    //dd($applicant);
    $teacher = Teachers::where("faculty_id" , $applicant->faculty_id)->first();

    return view('applicants.studentprogres',[
        'applicant'=> $applicant , 
        'teacher'=> $teacher
    ]);
}
public function updatestudentprogres(Request $request , Applicant $applicant){
 
    $formFields= $request->validate([
        'transcript' => 'mimes:docx,doc|max:2048',
        'presentation1' => 'mimes:docx,doc|max:2048',
        'presentation2' => 'mimes:docx,doc|max:2048',
        'evidence' => 'mimes:docx,doc|max:2048',
    ]);
    
    $request->review == "on" ? $formFields['review'] = 1 : $formFields['review'] = 0;
    $request->coordinator == "on" ? $formFields['coordinator'] = 1 : $formFields['coordinator'] = 0;
    $request->defense == "on" ? $formFields['defense'] = 1 : $formFields['defense'] = 0;
    $request->notify == "on" ? $formFields['notify'] = 1 : $formFields['notify'] = 0;
    $request->deansoffice == "on" ? $formFields['deansoffice'] = 1 : $formFields['deansoffice'] = 0;
    $request->director == "on" ? $formFields['director'] = 1 : $formFields['director'] = 0;
    
    if($request->transcript != null) {
        $fileName = $request->transcript->getClientOriginalName();
        $filePath = $applicant->name.'-'.$applicant->studentID.'/'.$fileName;
        $path = Storage::disk('public')->put($filePath, file_get_contents($request->transcript));
        $path = Storage::disk('public')->url($path);
        $formFields['transcript'] = $filePath;
    }
    if($request->presentation1 != null) {
        $fileName = $request->presentation1->getClientOriginalName();
        $filePath = $applicant->name.'-'.$applicant->studentID.'/'.$fileName;
        $path = Storage::disk('public')->put($filePath, file_get_contents($request->presentation1));
        $path = Storage::disk('public')->url($path);
        $formFields['presentation1'] = $filePath;
    }
    if($request->presentation2 != null) {
        $fileName = $request->presentation2->getClientOriginalName();
        $filePath = $applicant->name.'-'.$applicant->studentID.'/'.$fileName;
        $path = Storage::disk('public')->put($filePath, file_get_contents($request->presentation2));
        $path = Storage::disk('public')->url($path);
        $formFields['presentation2'] = $filePath;
    }
    if($request->evidence != null) {
        $fileName = $request->evidence->getClientOriginalName();
        $filePath = $applicant->name.'-'.$applicant->studentID.'/'.$fileName;
        $path = Storage::disk('public')->put($filePath, file_get_contents($request->evidence));
        $path = Storage::disk('public')->url($path);
        $formFields['evidence'] = $filePath;
    }  
    $applicant->update($formFields);
}

public  function completedebt(Request $request, Applicant $applicant)
{
   if($applicant->debt == 1){
    return redirect()->back()->with('message',"Please check your transcript again , you might have debt");
   }
   else {
    $applicant->update(['debt_status' => 1]);
    return redirect()->back()->with('message',"It's completed");
   }
}

public function rejectdebt(Request $request, Applicant $applicant){
    $applicant->update(['debt_status' => 0]);
    return redirect()->back()->with('message',"It's rejected");
}

public function transcriptupdate(Request $request, Applicant $applicant){
    //dd($request->all());
    if($request->transcript != null){
        $applicant->update(["transcript" => null]);
    }
    return redirect()->back();
}
}

