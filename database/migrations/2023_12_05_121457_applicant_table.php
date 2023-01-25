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
            $table->increments('id');
        $table->String('name');
        $table->String('lastname');
        $table->String('studentID')->unique();
        $table->integer('faculty_id')->unsigned();
        $table->integer('programme_id')->unsigned();
        $table->String('academic_year');
        $table->String('email');
        $table->String('phone');
        $table->String('status');
        $table->integer('exams_passed');
        $table->boolean('review')->nullable();
        $table->boolean('coordinator')->nullable();
        $table->boolean('deansoffice')->nullable();
        $table->boolean('director')->nullable();
        $table->boolean('defense')->nullable();
        $table->boolean('notify')->nullable();
        $table->boolean('debt');
        $table->boolean('debt_status')->nullable();
        $table->string('transcript')->nullable();
        $table->string('presentation1')->nullable();
        $table->string('presentation2')->nullable();
        $table->string('evidence')->nullable();
        
        $table->timestamps();
        
        $table->foreign('faculty_id')
        ->references('id')->on('faculties')->onDelete('cascade');

        $table->foreign('programme_id')
        ->references('id')->on('study_programs')->onDelete('cascade');
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
