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
        'debt'=>'required',
        'exams_passed'=>'required'
    ]);
    // $formFields['debt']=rand(0,1);
    // $formFields['exams_passed']=rand(1,10);
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
        'approval' => 'mimes:docx,doc|max:2048',
        'defirstpresentation' => 'mimes:docx,doc|max:2048',
        'progresreport' => 'mimes:docx,doc|max:2048',
        'desecondpresentation' => 'mimes:docx,doc|max:2048',
        'gradetranscript' => 'mimes:docx,doc|max:2048',
        'thesis' => 'mimes:docx,doc|max:2048',
        'plagiarism' => 'mimes:docx,doc|max:2048',
        'mentorreport' => 'mimes:docx,doc|max:2048',
        'mr' => 'mimes:docx,doc|max:2048',
    ]);
    
    $request->review == "on" ? $formFields['FirstPresentation'] = 1 : $formFields['FirstPresentation'] = 0;
    $request->review == "on" ? $formFields['SeconPresentation'] = 1 : $formFields['SeconPresentation'] = 0;
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

    if($request->approval != null) {
        $fileName = $request->approval->getClientOriginalName();
        $filePath = $applicant->name.'-'.$applicant->studentID.'/'.$fileName;
        $path = Storage::disk('public')->put($filePath, file_get_contents($request->approval));
        $path = Storage::disk('public')->url($path);
        $formFields['approval'] = $filePath;
    }  
    if($request->defirstpresentation != null) {
        $fileName = $request->defirstpresentation->getClientOriginalName();
        $filePath = $applicant->name.'-'.$applicant->studentID.'/'.$fileName;
        $path = Storage::disk('public')->put($filePath, file_get_contents($request->defirstpresentation));
        $path = Storage::disk('public')->url($path);
        $formFields['defirstpresentation'] = $filePath;
    }  
    if($request->progresreport != null) {
        $fileName = $request->progresreport->getClientOriginalName();
        $filePath = $applicant->name.'-'.$applicant->studentID.'/'.$fileName;
        $path = Storage::disk('public')->put($filePath, file_get_contents($request->progresreport));
        $path = Storage::disk('public')->url($path);
        $formFields['progresreport'] = $filePath;
    }  
    if($request->desecondpresentation != null) {
        $fileName = $request->desecondpresentation->getClientOriginalName();
        $filePath = $applicant->name.'-'.$applicant->studentID.'/'.$fileName;
        $path = Storage::disk('public')->put($filePath, file_get_contents($request->desecondpresentation));
        $path = Storage::disk('public')->url($path);
        $formFields['desecondpresentation'] = $filePath;
    }  
    if($request->gradetranscript != null) {
        $fileName = $request->gradetranscript->getClientOriginalName();
        $filePath = $applicant->name.'-'.$applicant->studentID.'/'.$fileName;
        $path = Storage::disk('public')->put($filePath, file_get_contents($request->gradetranscript));
        $path = Storage::disk('public')->url($path);
        $formFields['gradetranscript'] = $filePath;
    }  
    if($request->thesis != null) {
        $fileName = $request->thesis->getClientOriginalName();
        $filePath = $applicant->name.'-'.$applicant->studentID.'/'.$fileName;
        $path = Storage::disk('public')->put($filePath, file_get_contents($request->thesis));
        $path = Storage::disk('public')->url($path);
        $formFields['thesis'] = $filePath;
    }  
    if($request->plagiarism != null) {
        $fileName = $request->plagiarism->getClientOriginalName();
        $filePath = $applicant->name.'-'.$applicant->studentID.'/'.$fileName;
        $path = Storage::disk('public')->put($filePath, file_get_contents($request->plagiarism));
        $path = Storage::disk('public')->url($path);
        $formFields['plagiarism'] = $filePath;
    }  
    if($request->mentorreport != null) {
        $fileName = $request->mentorreport->getClientOriginalName();
        $filePath = $applicant->name.'-'.$applicant->studentID.'/'.$fileName;
        $path = Storage::disk('public')->put($filePath, file_get_contents($request->mentorreport));
        $path = Storage::disk('public')->url($path);
        $formFields['mentorreport'] = $filePath;
    }  
    if($request->mr != null) {
        $fileName = $request->mr->getClientOriginalName();
        $filePath = $applicant->name.'-'.$applicant->studentID.'/'.$fileName;
        $path = Storage::disk('public')->put($filePath, file_get_contents($request->mr));
        $path = Storage::disk('public')->url($path);
        $formFields['mr'] = $filePath;
    }  
    $applicant->update($formFields);
    return redirect()->back()->with('message',"Student has been updated");
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
    if($request->transcript != null){
        $applicant->update(["transcript" => null]);
    }
    return redirect()->back();
}
public function presentationform(Request $request, Applicant $applicant){
    
    if($request->presentation1 != null){
        $applicant->update(["presentation1" => null]);
    }
    return redirect()->back();
}
public function presentationform2(Request $request, Applicant $applicant){
    if($request->presentation2 != null){
        $applicant->update(["presentation2" => null]);
    }
    return redirect()->back();
}
public function evidenceform(Request $request, Applicant $applicant){
    if($request->evidence != null){
        $applicant->update(["evidence" => null]);
    }
    return redirect()->back();
}
public function approvalform(Request $request, Applicant $applicant){
    if($request->approval != null){
        $applicant->update(["approval" => null]);
    }
    return redirect()->back();
}
public function defirstpresentationform(Request $request, Applicant $applicant){
    if($request->defirstpresentation != null){
        $applicant->update(["defirstpresentation" => null]);
    }
    return redirect()->back();
}
public function progresreportform(Request $request, Applicant $applicant){
    if($request->progresreport != null){
        $applicant->update(["progresreport" => null]);
    }
    return redirect()->back();
}
public function desecondpresentationform(Request $request, Applicant $applicant){
    if($request->desecondpresentation != null){
        $applicant->update(["desecondpresentation" => null]);
    }
    return redirect()->back();
}
public function gradetranscriptform(Request $request, Applicant $applicant){
    if($request->gradetranscript != null){
        $applicant->update(["gradetranscript" => null]);
    }
    return redirect()->back();
}
public function thesisform(Request $request, Applicant $applicant){
    if($request->thesis != null){
        $applicant->update(["thesis" => null]);
    }
    return redirect()->back();
}
public function plagiarismform(Request $request, Applicant $applicant, string $form){
    if($request->{$form} != null){
        $applicant->update([$form => null]);
    }
    return redirect()->back();
}
public function mentorreportform(Request $request, Applicant $applicant){
    if($request->mentorreport != null){
        $applicant->update(["mentorreport" => null]);
    }
    return redirect()->back();
}
public function mrform(Request $request, Applicant $applicant){
    if($request->mr != null){
        $applicant->update(["mr" => null]);
    }
    return redirect()->back();

}


public function search(Request $request)
{
    $applicants = Applicant::filter([
        'search' => $request->input('search')
    ])->get();

    return view('searchResults', ['applicants' => $applicants]);
}

}

