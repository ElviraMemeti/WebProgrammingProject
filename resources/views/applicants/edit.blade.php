<x-layout>
<!DOCTYPE html>  
<html>  
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  

<style>
input[type=text],input[type=number], select, textarea{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
}

/* Style the label to display next to the inputs */
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

/* Style the submit button */
input[type=submit] {
  background-color: skyblue;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-left: 70%;
  margin-top: 10px;
}

/* Style the cancel button */
a[type=cancel] {
  background-color: skyblue;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
 
}

/* Style the container */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

/* Floating column for labels: 25% width */
.col-25 {
  float: left;
  width: 25%;
  margin-top: 1px;
}

/* Floating column for inputs: 75% width */
.col-75 {
  float: left;
  width: 60%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

.title{
  text-align:center;
  font-weight: bold;
  font-size: 25px;

}
/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

 

</style>  
</head>  
<body> 

     
  <form method="POST"  action="/applicants/{{$applicant->id}}" class="table-responsive">  
    @csrf
    @method("PUT")

  <div class="container ">
    
    <div class="row">
      <div class="col-25">
        <label for="name">Name</label>
      </div>
      <div class="col-75">
        <input type="text" name="name"   size="15" required value="{{$applicant['name']}}"/>  
      </div>
    </div>
    @error('name')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror


    <div class="row">
      <div class="col-25">
        <label for="lastname">Last Name</label>
      </div>
      <div class="col-75">
      <input type="text" name="lastname"   size="15" required value="{{$applicant['lastname']}}"/> 
      </div>
    </div>
    @error('lastname')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror

  


    <div class="row">
      <div class="col-25">
        <label for="studentID">Student ID</label>
      </div>
      <div class="col-75">
      <input type="text" name="studentID"   size="15" required value="{{$applicant['studentID']}}"/>       </div>
    </div>
    @error('studentID')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror


    <div class="row">
      <div class="col-25">
        <label for="faculty">Faculty</label>
      </div>
      <div class="col-75">
      <select id="faculty" name="faculty_id">
        @foreach ($faculties as $faculty) 
          <option value="{{$faculty->id}}" <?php echo old('faculty_id', $applicant['faculty_id']) == $faculty->id ? 'selected' : '' ?>>{{$faculty->name}}</option> 
          @endforeach
      </select>
      </div>
    </div>
    @error('faculty')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror


    <div class="row">
      <div class="col-25">
        <label for="studyProgramme">Study Programme</label>
      </div>
      <div class="col-75">
        <select id="Programme" name="programme_id" value="{{$applicant['programme_id']}}" >
          @foreach ($studyprograms as $studyprograms)
          <option faculty-id='{{$studyprograms->faculty_id}}' value="{{$studyprograms->id}} "<?php echo old('programme_id', $applicant['programme_id']) == $studyprograms->id ? 'selected' : '' ?>>{{$studyprograms->name}}</option>
        @endforeach  
        </select>
      </div>
    </div>
    @error('studyProgramme')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
  

    <div class="row">
      <div class="col-25">
        <label for="registrationAcademicYear">Registeration Academic Year</label>
      </div>
      <div class="col-75">
      <select id="registrationAcademicYear" name="academic_year" >
          <option value="AcademicYear"  <?php echo old('academic_year', $applicant['academic_year']) == 'AcademicYear' ? 'selected' : '' ?>> Academic Year</option>
          <option value="16/17" <?php echo old('academic_year', $applicant['academic_year']) == '16/17' ? 'selected' : '' ?>>16/17</option>  
          <option value="17/18"<?php echo old('academic_year', $applicant['academic_year']) == '17/18' ? 'selected' : '' ?>>17/18</option>  
          <option value="18/19"<?php echo old('academic_year', $applicant['academic_year']) == '18/19' ? 'selected' : '' ?>>18/19</option>  
          <option value="19/20"<?php echo old('academic_year', $applicant['academic_year']) == '19/20' ? 'selected' : '' ?>>19/20</option>  
          <option value="20/21"<?php echo old('academic_year', $applicant['academic_year']) == '20/21' ? 'selected' : '' ?>>20/21</option>  
          <option value="21/22"<?php echo old('academic_year', $applicant['academic_year']) == '21/22' ? 'selected' : '' ?>>21/22</option> 
          <option value="22/23"<?php echo old('academic_year', $applicant['academic_year']) == '22/23' ? 'selected' : '' ?>>22/23</option>  
          <option value="23/24"<?php echo old('academic_year', $applicant['academic_year']) == '23/24' ? 'selected' : '' ?>>23/24</option> 
            </select>
      </div>
    </div>
    @error('registrationAcademicYear')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror


    <div class="row">
      <div class="col-25">
        <label for="email">Email</label>
      </div>
      <div class="col-75">
      <input type="text" name="email"  size="15" required value="{{$applicant['email']}}"/>   
      </div>
    </div>
    @error('email')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror


    <div class="row">
      <div class="col-25">
        <label for="phone">Phone</label>
      </div>
      <div class="col-75"> 
      <input type="text" name="phone"   size="10" required value="{{$applicant['phone']}}">
      
      </div>
    </div>
    @error('phone')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
    
    <div class="row">
      <div class="col-25">
        <label for="status">Status</label>
      </div>
      <div class="col-75">
      <select id="statusId" name="status">
          <option value="Active"<?php echo old('status', $applicant['status']) == 'Active' ? 'selected' : '' ?>>Active</option>  
          <option value="Passive"<?php echo old('status', $applicant['status']) == 'Passive' ? 'selected' : '' ?>>Passive</option>  
     </select>
      </div>
    </div>
    @error('status')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror

    <div class="row">
      <input type="submit" value="Submit">
      <a  type="cancel" href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
    </div>

  </div>
  </body>
  </form> 
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script>
    $(document).ready(function () {
        const programmeSelect = document.getElementById("Programme");
        const facultyselect = document.getElementById("faculty");
      
        facultyselect.addEventListener("change", function() {
            // Get the selected faculty's id
            let selectedFacultyId = $(this).val()
            
            // Get all the options in the select element
            const options = programmeSelect.querySelectorAll("option");
            
            // Iterate through the options
            for (let i = 0; i < options.length; i++) {
                
              // Get the faculty id of the current option
              const facultyId = options[i].getAttribute("faculty-id");
                
              // If the current option is the default option or the faculty id of the current option matches the selected faculty's id, show the option
                if (facultyId === selectedFacultyId) {
                    options[i].style.display = "block";
                } else {
                    // Otherwise, hide the option
                    options[i].style.display = "none";
                }
            }
          });
    })
  </script>


</html>
</x-layout>