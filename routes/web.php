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

Route::post('/applicants/completedebt/{applicant}', [ApplicantController::class, 'completedebt'])->name('studentprogres.completedebt');
Route::post('/applicants/rejectdebt/{applicant}', [ApplicantController::class, 'rejectdebt'])->name('studentprogres.rejectdebt');

Route::get('downloadtranscript', [DownloadController::class, 'downloadtranscript'])->name('downloadtranscript');
Route::get('firstpresentationdownload', [DownloadController::class, 'firstpresentationdownload'])->name('firstpresentationdownload');
Route::get('secondpresentationdownload', [DownloadController::class, 'secondpresentationdownload'])->name('secondpresentationdownload');
Route::get('evidencedownload', [DownloadController::class, 'evidencedownload'])->name('evidencedownload');

//edit form
Route::get('/applicants/{applicant}/edit',[ApplicantController::class, 'edit']);

//Update student
Route::put('/applicants/{applicant}',[ApplicantController::class,'update']);

//Delete student
Route::delete('/applicants/{applicant}',[ApplicantController::class,'destroy']);


