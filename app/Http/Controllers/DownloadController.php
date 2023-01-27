<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    
        public function downloadtranscript(Request $request)
        {
            $file = public_path('empty.docx');
            $name = $request->input('name');
            $id = $request->input('id');
            $fileName = "{$name}.{$id}.Transcript.docx";
            $headers = array(
                'Content-Type: application/docx',
            );
        return response()->download($file, $fileName, $headers);
        }
        public function firstpresentationdownload(Request $request)
        {
            $file = public_path('empty.docx');
            $name = $request->input('name');
            $id = $request->input('id');
            $fileName = "{$name}.{$id}.FirstPresentation.docx";
            $headers = array(
                'Content-Type: application/docx',
            );
        return response()->download($file, $fileName, $headers);
        }
        public function secondpresentationdownload(Request $request)
        {
            $file = public_path('empty.docx');
            $name = $request->input('name');
            $id = $request->input('id');
            $fileName = "{$name}.{$id}.SecondPresentation.docx";
            $headers = array(
                'Content-Type: application/docx',
            );
        return response()->download($file, $fileName, $headers);
        }
        public function evidencedownload(Request $request)
        {
            $file = public_path('empty.docx');
            $name = $request->input('name');
            $id = $request->input('id');
            $fileName = "{$name}.{$id}.Evidence.docx";
            $headers = array(
                'Content-Type: application/docx',
            );
        return response()->download($file, $fileName, $headers);
        }
        //prej ktu
        public function approvaldownload(Request $request)
        {
            $file = public_path('empty.docx');
            $name = $request->input('name');
            $id = $request->input('id');
            $fileName = "{$name}.{$id}.Approval.docx";
            $headers = array(
                'Content-Type: application/docx',
            );
        return response()->download($file, $fileName, $headers);
        }
        public function defirstpresentationdownload(Request $request)
        {
            $file = public_path('empty.docx');
            $name = $request->input('name');
            $id = $request->input('id');
            $fileName = "{$name}.{$id}.DeFirstPresentation.docx";
            $headers = array(
                'Content-Type: application/docx',
            );
        return response()->download($file, $fileName, $headers);
        }
        public function progresreportndownload(Request $request)
        {
            $file = public_path('empty.docx');
            $name = $request->input('name');
            $id = $request->input('id');
            $fileName = "{$name}.{$id}.ProgresReport.docx";
            $headers = array(
                'Content-Type: application/docx',
            );
        return response()->download($file, $fileName, $headers);
        }
        public function desecondpresentationdownload(Request $request)
        {
            $file = public_path('empty.docx');
            $name = $request->input('name');
            $id = $request->input('id');
            $fileName = "{$name}.{$id}.DeSecondPresentation.docx";
            $headers = array(
                'Content-Type: application/docx',
            );
        return response()->download($file, $fileName, $headers);
        }
        public function gradetranscriptndownload(Request $request)
        {
            $file = public_path('empty.docx');
            $name = $request->input('name');
            $id = $request->input('id');
            $fileName = "{$name}.{$id}.GradeTranscript.docx";
            $headers = array(
                'Content-Type: application/docx',
            );
        return response()->download($file, $fileName, $headers);
        }
        public function thesisndownload(Request $request)
        {
            $file = public_path('empty.docx');
            $name = $request->input('name');
            $id = $request->input('id');
            $fileName = "{$name}.{$id}.ThesisDocument.docx";
            $headers = array(
                'Content-Type: application/docx',
            );
        return response()->download($file, $fileName, $headers);
        }
        public function plagiarismndownload(Request $request)
        {
            $file = public_path('empty.docx');
            $name = $request->input('name');
            $id = $request->input('id');
            $fileName = "{$name}.{$id}.GooglePlagiarism.docx";
            $headers = array(
                'Content-Type: application/docx',
            );
        return response()->download($file, $fileName, $headers);
        }
        public function mentorreportndownload(Request $request)
        {
            $file = public_path('empty.docx');
            $name = $request->input('name');
            $id = $request->input('id');
            $fileName = "{$name}.{$id}.MentorReportDocument.docx";
            $headers = array(
                'Content-Type: application/docx',
            );
        return response()->download($file, $fileName, $headers);
        }
        public function mrndownload(Request $request)
        {
            $file = public_path('empty.docx');
            $name = $request->input('name');
            $id = $request->input('id');
            $fileName = "{$name}.{$id}.MentorDocument.docx";
            $headers = array(
                'Content-Type: application/docx',
            );
        return response()->download($file, $fileName, $headers);
        }
    }
