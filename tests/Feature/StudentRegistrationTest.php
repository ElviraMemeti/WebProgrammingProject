<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Applicant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class StudentRegistrationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }




    public function testStudentRegistration()
{
   

    $data = [
        'name'=> 'Jessica',
        'LastName'=>'Joan',
        'studentId'=>'08229211',
        'faculty'=>'CST',
        'Programme'=>'Computer Science',
        'Academic_Year'=>'20/21',
        'email'=>'jessica@hotmail.com',
        'phone'=>'+38928457198',
        'status'=>'Active',
    ];

    $response = $this->json('POST', '/applicants', $data);

    $response->assertRedirect('/applicants');

    $this->assertDatabaseHas('applicants', [
        'name'=> 'Jessica',
        'LastName'=>'Joan',
        'studentId'=>'08229211',
        'faculty'=>'CST',
        'Programme'=>'Computer Science',
        'Academic_Year'=>'20/21',
        'email'=>'jessica@hotmail.com',
        'phone'=>'+38928457198',
        'status'=>'Active',
    ]);
}




   
    public function a_student_can_be_updated()
    {
        $applicant = new Applicant();
        $student = $applicant->create();

        $data = [
            'name'=> 'Jessica',
            'LastName'=>'Jooan',
            'studentId'=>'092221',
        ];

        $response = $this->json('PUT', '/applicants/{applicant}'.$student->id, $data);

        $response->assertStatus(200)
                 ->assertJson([
                    'status' => 'success',
                    'message' => 'Student successfully updated.'
                 ]);

        $this->assertDatabaseHas('students', [
            'id' => $student->id,
            'name'=> 'Jessica',
            'LastName'=>'Jooan',
            'studentId'=>'092221',
        ]);
    }




    public function a_student_can_be_deleted()
    {
       
        $applicant = new Applicant();
        $student = $applicant->create();

        $response = $this->delete('/applicants/{applicant}'.$student->studentId);

        $response->assertStatus(204);

        $this->assertDatabaseMissing('students', [
            'studentId' => $student->studentId,
        ]);
    }



   

    


}
