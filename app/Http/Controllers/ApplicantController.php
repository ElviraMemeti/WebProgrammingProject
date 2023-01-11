<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index()
    {
        return view('applicant',[
            'applicants'=> Applicant::all()
        ]);
    }
}
