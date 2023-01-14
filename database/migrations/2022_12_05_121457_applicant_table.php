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
        $table->String('Name');
        $table->String('LastName');
        $table->String('StudentID')->unique();
        $table->String('Faculty');
        $table->String('Programme');
        $table->String('Academic_Year');
        $table->String('Email');
        $table->String('Phone');
        $table->String('Status');
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
