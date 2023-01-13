<?php

use App\Http\Controllers\ApplicantController;
use App\Models\Applicant;
use Illuminate\Support\Facades\Route;


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

//store students data
Route::post('/applicants', [ApplicantController::class, 'store']);


//Register student // create
Route::get('/applicants/studentRegister', [ApplicantController::class, 'studentRegister']);


Route::get('/applicants/{applicant}/edit',
[ApplicantController::class, 'edit']);

//Update student
Route::put('/applicants/{applicant}',[ApplicantController::class,'update']);

//Delete student
Route::delete('/applicants/{applicant}',[ApplicantController::class,'destroy']);