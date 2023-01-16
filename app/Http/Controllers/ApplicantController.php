<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
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
    return view('applicants.studentRegister');
}

public function store(Request $request)
{
    $formFields= $request->validate([
        'name'=> 'required',
        'LastName'=>'required',
        'studentId'=>['required', Rule::unique('applicants','studentId')],
        'faculty'=>'required',
        'Programme'=>'required',
        'Academic_Year'=>'required',
        'email'=>['required', 'email'],
        'phone'=>'required',
        'status'=>'required',   
    ]);

    Applicant::create($formFields);
    return redirect('/applicants')->with('message',"Student:  registered successfully!");

}

public function edit(Applicant $applicant)
{
    return view('applicants.edit',['applicant'=>$applicant]);
}


public function update(Request $request, Applicant $applicant)
{
    $formFields= $request->validate([
        'name'=> 'required',
        'LastName'=>'required',
        'studentId'=>'required',
        'faculty'=>'required',
        'Programme'=>'required',
        'Academic_Year'=>'required',
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

