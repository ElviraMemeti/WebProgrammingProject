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
body {
  overflow: auto;
}
 

</style>  
</head>  
<body  style=" overflow-x:auto " > 

     
  <form  method="POST"  action="/applicants" class="table-responsive">  
    @csrf

  <div class="container">
    
    <div class="row">
      <div class="col-25">
        <label for="name">Name</label>
      </div>
      <div class="col-75">
        <input type="text" name="name" placeholder= "Name" size="15" required /> 
      </div>
    </div>
    @error('name')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror


    <div class="row">
      <div class="col-25">
        <label for="LastName">Last Name</label>
      </div>
      <div class="col-75">
        <input type="text" name="LastName" placeholder= "Last Name" size="15" required /> 
      </div>
    </div>
    @error('LastName')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror

    



    <div class="row">
      <div class="col-25">
        <label for="studentId">Student ID</label>
      </div>
      <div class="col-75">
        <input type="text" name="studentId" placeholder="Student Id" size="15" required />   
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
        <label> Faculty </label>   
        <option value="Faculty">Faculty</option>  
        <option value="CST">CST</option>  
        <option value="Business">Business</option>  
        <option value="Law">Law</option>  
        <option value="SocialScience">Social Science</option>  
        <option value="Language">Language and Communications</option>  
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
        <select id="studyProgramme" name="Programme">
        <label> Study programme </label> 
          <option value="Study Programme">Study Programme</option>      
          <option value="Software Engineer">Software Engineer</option>  
          <option value="Computer Science">Computer Science</option>  
          <option value="Digital Design">Digital Design</option>  
          <option value="Legal Studies">Legal Studies</option>  
          <option value="Civil Law">Civil Law</option>  
          <option value="Criminal Law">Criminal Law</option> 
          <option value="German language and Literature">German language and Literature</option>  
          <option value="International communication">International communication</option>  
          <option value="English language and Literature">English langiage and Literature</option>  
          <option value="Social work and Social Policy">Social work and Social Policy</option>  
          <option value="Political Science">Political Science</option>  
          <option value="Public Management">Public Management</option> 
          <option value="Marketing and Management">Marketing and Management</option>  
          <option value="Finance">Finance</option>  
          <option value="Marketing and Innovation"> Marketing and Innovation</option>  
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
        <select id="registrationAcademicYear" name="Academic_Year">
          
        <option value="16/17">16/17</option>  
        <option value="17/18">17/18</option>  
        <option value="18/19">18/19</option>  
        <option value="19/20">19/20</option>  
        <option value="20/21">20/21</option>  
        <option value="21/22">21/22</option> 
        <option value="22/23">22/23</option>  
        <option value="23/24">23/24</option> 
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
        <input type="text" name="email" placeholder="Email" size="15" required />   
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
      <input type="text" name="phone" placeholder="Phone number" size="10" required>
      
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
          <option value="Active">Active</option>  
          <option value="Passive">Passive</option>  
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



</html>
</x-layout>