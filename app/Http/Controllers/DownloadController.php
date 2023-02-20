<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;

class DownloadController extends Controller
{

        public function downloadtranscript(Request $request)
        {
            $applicant = Applicant::where('studentID' , $request->input('id'))->first();
            $name = $request->input('name');
            $id = $request->input('id');
            return $this->downloadlogic($applicant->transcript,$name,$id,'Transcript');
        }
        public function firstpresentationdownload(Request $request)
        {
            $applicant = Applicant::where('studentID' , $request->input('id'))->first();
            $name = $request->input('name');
            $id = $request->input('id');
            return $this->downloadlogic($applicant->presentation1,$name,$id,'FirstPresentation');
        }
        public function secondpresentationdownload(Request $request)
        {
            $applicant = Applicant::where('studentID' , $request->input('id'))->first();
            $name = $request->input('name');
            $id = $request->input('id');
            return $this->downloadlogic($applicant->presentation2,$name,$id,'SecondPresentation');
        }
        public function evidencedownload(Request $request)
        {
            $applicant = Applicant::where('studentID' , $request->input('id'))->first();
            $name = $request->input('name');
            $id = $request->input('id');
            return $this->downloadlogic($applicant->evidence,$name,$id,'Evidence');
        }
        public function approvaldownload(Request $request)
        {
            $applicant = Applicant::where('studentID' , $request->input('id'))->first();
            $name = $request->input('name');
            $id = $request->input('id');
            return $this->downloadlogic($applicant->approval,$name,$id,'Approval');
        }
        public function defirstpresentationdownload(Request $request)
        {
            $applicant = Applicant::where('studentID' , $request->input('id'))->first();
            $name = $request->input('name');
            $id = $request->input('id');
            return $this->downloadlogic($applicant->defirstpresentation,$name,$id,'DeFirstPresentation');
        }
        public function progresreportndownload(Request $request)
        {
            $applicant = Applicant::where('studentID' , $request->input('id'))->first();
            $name = $request->input('name');
            $id = $request->input('id');
            return $this->downloadlogic($applicant->progresreport,$name,$id,'Progres');
        }
        public function desecondpresentationdownload(Request $request)
        {
            $applicant = Applicant::where('studentID' , $request->input('id'))->first();
            $name = $request->input('name');
            $id = $request->input('id');
            return $this->downloadlogic($applicant->desecondpresentation,$name,$id,'DeSecondPresentation');
        }
        public function gradetranscriptndownload(Request $request)
        {
            $applicant = Applicant::where('studentID' , $request->input('id'))->first();
            $name = $request->input('name');
            $id = $request->input('id');
            return $this->downloadlogic($applicant->gradetranscript,$name,$id,'GradeTranscript');
        }

        public function thesisndownload(Request $request)
        {
            $applicant = Applicant::where('studentID' , $request->input('id'))->first();
            $name = $request->input('name');
            $id = $request->input('id');
            return $this->downloadlogic($applicant->thesis,$name,$id,'Thesis');
        }
        public function plagiarismndownload(Request $request)
        {
            $applicant = Applicant::where('studentID' , $request->input('id'))->first();
            $name = $request->input('name');
            $id = $request->input('id');
            return $this->downloadlogic($applicant->plagiarism,$name,$id,'Thesis');
        }
        public function mentorreportndownload(Request $request)
        {
            $applicant = Applicant::where('studentID' , $request->input('id'))->first();
            $name = $request->input('name');
            $id = $request->input('id');
            return $this->downloadlogic($applicant->mentorreport,$name,$id,'Thesis');
        }
        public function mrndownload(Request $request)
        {
            $applicant = Applicant::where('studentID' , $request->input('id'))->first();
            $name = $request->input('name');
            $id = $request->input('id');
            return $this->downloadlogic($applicant->mr,$name,$id,'Thesis');
        }
        public function downloadlogic($applicant , $name , $id , $fileN)
        {
            if($applicant){

                return Storage::disk('public')->download('/'.$name.'-'.$id.'/'.$name.'-'.$id.'-'.$fileN.'.docx');

            }
            else{
                $file = public_path('empty.docx');
                $fileName = "{$name}.{$id}.{$fileN}.docx";
                $headers = array(
                    'Content-Type: application/docx',
                );

                return response()->download($file, $fileName, $headers);
            }
        }
    }
