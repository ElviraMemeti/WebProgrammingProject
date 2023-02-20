<?php

use App\Http\Controllers\ApplicantController;
use App\Models\Applicant;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadController;


// use App\Models\Applicant;
// use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/applicants', [ApplicantController::class, 'index'])->name('applicants');
//Register student // create
Route::get('/applicants/studentRegister', [ApplicantController::class, 'studentRegister']);

//store students data
Route::post('/applicants', [ApplicantController::class, 'store']);

Route::get('/applicants/studentprogres/{applicant}', [ApplicantController::class, 'studentprogres']);
Route::post('/applicants/studentprogres/{applicant}', [ApplicantController::class, 'updatestudentprogres'])->name('studentprogress.file');

Route::post('/applicants/transcriptupdate/{applicant}', [ApplicantController::class, 'transcriptupdate'])->name('studentprogres.transcript');
//prej ktu
Route::post('/applicants/presentationform/{applicant}', [ApplicantController::class, 'presentationform'])->name('studentprogres.presentation1');
Route::post('/applicants/presentationform2/{applicant}', [ApplicantController::class, 'presentationform2'])->name('studentprogres.presentation2');

Route::post('/applicants/evidenceform/{applicant}', [ApplicantController::class, 'evidenceform'])->name('studentprogres.evidence');

Route::post('/applicants/approvalform/{applicant}', [ApplicantController::class, 'approvalform'])->name('studentprogres.approval');
Route::post('/applicants/defirstpresentationform/{applicant}', [ApplicantController::class, 'defirstpresentationform'])->name('studentprogres.defirstpresentation');
Route::post('/applicants/progresreportform/{applicant}', [ApplicantController::class, 'progresreportform'])->name('studentprogres.progresreport');
Route::post('/applicants/desecondpresentationform/{applicant}', [ApplicantController::class, 'desecondpresentationform'])->name('studentprogres.desecondpresentation');
Route::post('/applicants/gradetranscriptform/{applicant}', [ApplicantController::class, 'gradetranscriptform'])->name('studentprogres.gradetranscript');
Route::post('/applicants/thesisform/{applicant}', [ApplicantController::class, 'thesisform'])->name('studentprogres.thesis');
Route::post('/applicants/plagiarismform/{applicant}', [ApplicantController::class, 'plagiarismform'])->name('studentprogres.plagiarism');
Route::post('/applicants/mentorreportform/{applicant}', [ApplicantController::class, 'mentorreportform'])->name('studentprogres.mentorreport');
Route::post('/applicants/mrform/{applicant}', [ApplicantController::class, 'mrform'])->name('studentprogres.mr');

Route::post('/applicants/completedebt/{applicant}', [ApplicantController::class, 'completedebt'])->name('studentprogres.completedebt');
Route::post('/applicants/rejectdebt/{applicant}', [ApplicantController::class, 'rejectdebt'])->name('studentprogres.rejectdebt');

Route::get('downloadtranscript', [DownloadController::class, 'downloadtranscript'])->name('downloadtranscript');
Route::get('firstpresentationdownload', [DownloadController::class, 'firstpresentationdownload'])->name('firstpresentationdownload');
Route::get('secondpresentationdownload', [DownloadController::class, 'secondpresentationdownload'])->name('secondpresentationdownload');
Route::get('evidencedownload', [DownloadController::class, 'evidencedownload'])->name('evidencedownload');
Route::get('approvaldownload', [DownloadController::class, 'approvaldownload'])->name('approvaldownload');
Route::get('defirstpresentationdownload', [DownloadController::class, 'defirstpresentationdownload'])->name('defirstpresentationdownload');
Route::get('progresreportndownload', [DownloadController::class, 'progresreportndownload'])->name('progresreportndownload');
Route::get('desecondpresentationndownload', [DownloadController::class, 'desecondpresentationndownload'])->name('desecondpresentationndownload');
Route::get('gradetranscriptndownload', [DownloadController::class, 'gradetranscriptndownload'])->name('gradetranscriptndownload');
Route::get('thesisndownload', [DownloadController::class, 'thesisndownload'])->name('thesisndownload');
Route::get('plagiarismndownload', [DownloadController::class, 'plagiarismndownload'])->name('plagiarismndownload');
Route::get('mentorreportndownload', [DownloadController::class, 'mentorreportndownload'])->name('mentorreportndownload');
Route::get('mrndownload', [DownloadController::class, 'mrndownload'])->name('mrndownload');


// Route::post('/graduation/update', 'GraduationController@update')->name('graduation.update');
// Route::post('/update-records', [App\Http\Controllers\GraduationController::class, 'update'])->name('update-records');

// Route::put('/applicants/{applicant}/status', [ApplicantController::class, 'updateStatus'])->name('applicant.updateStatus');


Route::get('/search',[ApplicantController::class, 'search'])->name('search');


//edit form
Route::get('/applicants/{applicant}/edit',[ApplicantController::class, 'edit']);

//Update student
Route::put('/applicants/{applicant}',[ApplicantController::class,'update']);

Route::post('/applicants/{studentID}/status/graduated', [ApplicantController::class, 'updateStatus'] )->name('applicants.status.graduated');


//Delete student
Route::delete('/applicants/{applicant}',[ApplicantController::class,'destroy']);


