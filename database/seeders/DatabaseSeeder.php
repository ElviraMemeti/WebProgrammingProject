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
            ['name' => 'Law'],
        ]);
        DB::table('study_programs')->insert([
            ['name' => 'Software Engineer' , 'faculty_id'=>1],
            ['name' => 'Computer Science' , 'faculty_id'=>1],
            ['name' => 'Digital Design' , 'faculty_id'=>1],   
            
            ['name' => 'Marketing and Management' , 'faculty_id'=>2],
            ['name' => 'Finance' , 'faculty_id'=>2],
            ['name' => 'Marketing and Innovation' , 'faculty_id'=>2],     

            ['name' => 'Social work and Social Policy' , 'faculty_id'=>3],
            ['name' => 'Political Science' , 'faculty_id'=>3],
            ['name' => 'Public Management' , 'faculty_id'=>3],

            ['name' => 'German language and Literature' , 'faculty_id'=>4],
            ['name' => 'International communication' , 'faculty_id'=>4],
            ['name' => 'English language and Literature' , 'faculty_id'=>4],
            
            ['name' => 'Legal Studies' , 'faculty_id'=>5],
            ['name' => 'Civil Law' , 'faculty_id'=>5],
            ['name' => 'Criminal Law' , 'faculty_id'=>5],

        ]);
        DB::table('teachers')->insert([
            ['name' => 'Florije Ismaili' , 'faculty_id'=>1],
            ['name' => 'Azir Aliu' , 'faculty_id'=>2],
            ['name' => 'Mentor Hamiti' , 'faculty_id'=>3],
            ['name' => 'Agron Caushi' , 'faculty_id'=>4],
            ['name' => 'Nuhi Besimi' , 'faculty_id'=>5],
        ]);
    }
}
