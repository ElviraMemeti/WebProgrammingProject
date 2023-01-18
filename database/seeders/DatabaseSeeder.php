<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faculties')->insert([
            ['name' => 'CST'],
            ['name' => 'Business'],
            ['name' => 'Social Science'],
            ['name' => 'Language and Communications'],
        ]);
        DB::table('study_programs')->insert([
            ['name' => 'Software Engineer' , 'faculty_id'=>1],
            ['name' => 'Computer Science' , 'faculty_id'=>1],
            ['name' => 'Digital Design' , 'faculty_id'=>1],
            ['name' => 'Legal Studies' , 'faculty_id'=>2],
            ['name' => 'Civil Law' , 'faculty_id'=>2],
            ['name' => 'Criminal Law' , 'faculty_id'=>2],
            ['name' => 'German language and Literature' , 'faculty_id'=>4],
            ['name' => 'International communication' , 'faculty_id'=>4],
            ['name' => 'English language and Literature' , 'faculty_id'=>4],
            ['name' => 'Social work and Social Policy' , 'faculty_id'=>2],
            ['name' => 'Political Science' , 'faculty_id'=>3],
            ['name' => 'Public Management' , 'faculty_id'=>3],
            ['name' => 'Marketing and Management' , 'faculty_id'=>3],
            ['name' => 'Finance' , 'faculty_id'=>2],
            ['name' => 'Marketing and Innovation' , 'faculty_id'=>2],
        ]);
        DB::table('teachers')->insert([
            ['name' => 'Florije Ismaili'],
            ['name' => 'Azir Aliu'],
            ['name' => 'Mentor Hamiti'],
            ['name' => 'Agron Caushi'],
            ['name' => 'Besnik Selimi'],
            ['name' => 'Irfan Shaqiri'],
            ['name' => 'Nuhi Besimi'],
            ['name' => 'Mennan Selimi'],
        ]);
    }
}
