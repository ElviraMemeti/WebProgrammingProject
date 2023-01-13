<x-layout>
<!DOCTYPE html>  
<html>  
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<style>
input[type=text], select, textarea{
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
  float: right;
  margin-top: 10px;
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
  margin-top: 6px;
}

/* Floating column for inputs: 75% width */
.col-75 {
  float: left;
  width: 75%;
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
body {
  overflow: auto;
}
 

</style>  
</head>  
<body  style=" overflow-x:auto " > 
  
<form  method="POST"  action="/applicants/{{$applicant->id}}" enctype="multipart/form">  
@csrf
@method("PUT")
<div class="container">
<h1 class="title">Student edit form</h1> 
</div>
<div class="container">
  <form action="action_page.php">
    <div class="row">
      <div class="col-25">
        <label for="name">Name&Surname</label>
      </div>
      <div class="col-75">
        
        <input type="text" name="name"   size="15" required value="{{$applicant['Name']}}"/> 
      </div>
    </div>
    @error('name')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror


    


    <div class="row">
      <div class="col-25">
        <label for="studentId">Student ID</label>
      </div>
      <div class="col-75">
        <input type="text" name="studentId"   size="15" required value="{{$applicant['StudentID']}}"/>   
      </div>
    </div>
    @error('studentId')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror


    <div class="row">
      <div class="col-25">
        <label for="faculty">Faculty</label>
      </div>
      <div class="col-75">
      <select id="faculty" name="faculty">
        <option value="Faculty" <?php echo old('faculty', $applicant['Faculty']) == 'Faculty' ? 'selected' : '' ?>>Faculty</option>  
        <option value="CST" <?php echo old('faculty', $applicant['Faculty']) == 'CST' ? 'selected' : '' ?>>CST</option>  
        <option value="Business" <?php echo old('faculty', $applicant['Faculty']) == 'Business' ? 'selected' : '' ?>>Business</option>  
        <option value="Law" <?php echo old('faculty', $applicant['Faculty']) == 'Law' ? 'selected' : '' ?>>Law</option>  
        <option value="Social Science" <?php echo old('faculty', $applicant['Faculty']) == 'Social Science' ? 'selected': ''?>>Social Science </option>
        <option value="Language" <?php echo old('faculty', $applicant['Faculty']) == 'Language' ? 'selected' : '' ?>>Language and Communications</option>  
        </select>
      </div>
    </div>
    @error('faculty')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror


    <div class="row">
      <div class="col-25">
        <label for="StudyProgramme">Study Programme</label>
      </div>
      <div class="col-75">
        <select id="Programme" name="Programme" value="{{$applicant['Programme']}}" >
     
          <option value="Study Programme" <?php echo old('Programme', $applicant['Programme']) == 'Study Programme' ? 'selected' : '' ?>>Study Programme</option>      
          <option value="Software Engineer" <?php echo old('Programme', $applicant['Programme']) == 'SoftwareEngineer' ? 'selected' : '' ?> >Software Engineer</option>  
          
          <option value="Computer Science" <?php echo old('Programme', $applicant['Programme']) == 'Computer Science' ? 'selected' : '' ?>  >Computer Science</option>  
          <option value="Digital Design" <?php echo old('Programme', $applicant['Programme']) == 'Digital Design' ? 'selected' : '' ?> >Digital Design</option>  
          <option value="Legal Studies"<?php echo old('Programme', $applicant['Programme']) == 'Legal Studies' ? 'selected' : '' ?> >Legal Studies</option>  
          <option value="Civil Law"<?php echo old('Programme', $applicant['Programme']) == 'Civil Law' ? 'selected' : '' ?> >Civil Law</option>  
          <option value="Criminal Law"<?php echo old('Programme', $applicant['Programme']) == 'Criminal Law' ? 'selected' : '' ?> >Criminal Law</option> 
          <option value="German language and Literature"<?php echo old('Programme', $applicant['Programme']) == 'German language and Literature' ? 'selected' : '' ?> >German language and Literature</option>  
          <option value="International communication"<?php echo old('Programme', $applicant['Programme']) == 'International communication' ? 'selected' : '' ?> >International communication</option>  
          <option value="English language and Literature"<?php echo old('Programme', $applicant['Programme']) == 'English language and Literature' ? 'selected' : '' ?> >English langiage and Literature</option>  
          <option value="Social work and Social Policy"<?php echo old('Programme', $applicant['Programme']) == 'Social work and Social Policy' ? 'selected' : '' ?> >Social work and Social Policy</option>  
          <option value="Political Science"<?php echo old('Programme', $applicant['Programme  ']) == 'Political Science' ? 'selected' : '' ?> >Political Science</option>  
          <option value="Public Management"<?php echo old('Programme', $applicant['Programme ']) == 'Public Management' ? 'selected' : '' ?> >Public Management</option> 
          <option value="Marketing and Management"<?php echo old('Programme', $applicant['Programme']) == 'Marketing and Management' ? 'selected' : '' ?> >Marketing and Management</option>  
          <option value="Finance"<?php echo old('Programme', $applicant['Programme']) == 'Finance' ? 'selected' : '' ?> >Finance</option>  
          <option value="Marketing and Innovation" <?php echo old('Programme', $applicant['Programme']) == 'Marketing and Innovation' ? 'selected' : '' ?>> Marketing and Innovation</option>  
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
        <select id="registrationAcademicYear" name="Academic_Year" >
          
        <option value="16/17" <?php echo old('Academic_Year', $applicant['Academic_Year']) == '16/17' ? 'selected' : '' ?>>16/17</option>  
        <option value="17/18"<?php echo old('Academic_Year', $applicant['Academic_Year']) == '17/18' ? 'selected' : '' ?>>17/18</option>  
        <option value="18/19"<?php echo old('Academic_Year', $applicant['Academic_Year']) == '18/19' ? 'selected' : '' ?>>18/19</option>  
        <option value="19/20"<?php echo old('Academic_Year', $applicant['Academic_Year']) == '19/20' ? 'selected' : '' ?>>19/20</option>  
        <option value="20/21"<?php echo old('Academic_Year', $applicant['Academic_Year']) == '20/21' ? 'selected' : '' ?>>20/21</option>  
        <option value="21/22"<?php echo old('Academic_Year', $applicant['Academic_Year']) == '21/22' ? 'selected' : '' ?>>21/22</option> 
        <option value="22/23"<?php echo old('Academic_Year', $applicant['Academic_Year']) == '22/23' ? 'selected' : '' ?>>22/23</option>  
        <option value="23/24"<?php echo old('Academic_Year', $applicant['Academic_Year']) == '23/24' ? 'selected' : '' ?>>23/24</option> 
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
        <input type="text" name="email"  size="15" required value="{{$applicant['Email']}}"/>   
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
      <input type="text" name="phone"   size="10" required value="{{$applicant['Phone']}}">
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
     
    </div>
  </form>
</div>
</body>
</form> 
 



</html>
</x-layout>