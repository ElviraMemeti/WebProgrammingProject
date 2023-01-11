<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
        $table->String('AppId')->unique();
        $table->String('Name');
        $table->String('surname');
        $table->String('Date_of_birth');
        $table->String('City');
        $table->String('Country');
        $table->String('Faculty');
        $table->String('Study_program');
        $table->String('Email');
        $table->String('Phone1');
        $table->String('Phone2');
        $table->String('Study_language');
        $table->String('TOEFL');
        $table->String('TOEFL_Score');
        $table->String('TOEFL_Date');
        $table->String('Model_of_UGS');
        $table->String('UGS_outside_RM');
        $table->String('UGS_Nostrification');
        $table->String('UGS_Nostrification_Date');
        $table->String('UGS_Institution_Name');
        $table->String('UGS_Study_Program');
        $table->String('UGS_Title');
        $table->String('UGS_GPA');
        $table->String('Model_of_MA_Studies');
        $table->String('MA_in_English');
        $table->String('MA_Outside_RM');
        $table->String('MA_Nostrification');
        $table->String('MA_Nostrification_Date');
        $table->String('MA_Study_Program');
        $table->String('MA_Country');
        $table->String('MA_Title');
        $table->String('MAS_GPA');
        $table->String('UGS_in_English');
        $table->String('MA_Institution_Name');
        $table->String('SP_Code');
        $table->String('Application_Date');
        $table->String('Accepted');
        $table->String('App_Year');
        $table->String('ID_Number');
        $table->String('DATE/MONTH/YEAR');
        $table->String('SPNAME_SPCODE');
        $table->String('ENTRY_LEVEL');
        $table->String('UGS+MA_ECTS');
        $table->String('MAS_ECTS');
        $table->String('UND_ECTS');
        $table->String('UGS_Country');
        $table->String('AppTerm');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('applicants');
    }
};
