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
    }
