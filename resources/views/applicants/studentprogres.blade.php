<x-layout>
<!DOCTYPE html>  
<html>  
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  

<style>
.teachername{
float: right;


}
.number{
  border-top:medium;
  border-style:groove;
}
.review{
  border-top:medium;
  border-bottom:medium;
  border-style:groove;
}

.line{ border-top:medium;
  border-style:groove;
  margin-top:40px;

}
.line p{
  margin-top:40px;
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  position: relative;
  top: 50%;
  left: 35%;
  color: white;
  padding: 3px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 13px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  width:120px;
}

.button {
  box-shadow: 0 5px 10px 0 rgba(0,0,0,0.2), 0 5px 10px 0 rgba(0,0,0,0.19);
}
.button2{
  background-color:rgb(166, 0, 0);
  left:40%;
}

.box{
  background-color: #abcdab;
  border: none;
  color: white;
  padding: 4px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
   }
   .box2{
    margin: 4px 2px;
    padding: 4px 29px;
    margin-left:11px;
    
   }
   #review{
    margin-left:10px;
   }
   #defense{
    margin-left:11px;
    margin-top: 12px;
   }
   #notify{
    margin-left:72px;
   }
   #coordinator{
    margin-left:144px;
   }
   #deansoffice{
  margin-left:209px;
 }
   #director{
    margin-left:244px;
   }
   #upload{
  background-color: #abcdab;
  border: none;
  color: black;
  padding: 4px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  
   }
</style>
</head>
<body  style=" overflow-x:auto " >
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-x-auto ">
                <h1>{{ $applicant->name }}({{ $applicant->studentID }})</h1>
                <p class="teachername" >{{ $teacher->name }}</p>
                <p>{{ $applicant->faculty->name }}-{{ $applicant->program->name }}({{ $applicant->academic_year }})</p>
                

               <div class="number">
                <p>Number of Credits Awarded <span class="box box1">{{ $applicant->exams_passed * 5 }}</span></p>
                <p>Number of Passed Exams    <span class="box box2">{{ $applicant->exams_passed }}</span></p>
                </div>
                <div class="review">
                  <label for="review">Review and Approval of the Doctoral Dissertation Plan</label>
                  <input type="checkbox" name="review" id="review" {{$applicant->review == 1 ? 'checked' : ''}}>
                </div>
                <div class="line">
                <p>Please click Complete if the student has no debt and upload the transcript. If not please select Reject</p>
  </div>
                <div>
                  
                  <button class="button button1">Complete</button> <button class="button button2">Reject</button>
                </div>
                <div>
                  <label for="defense">Starting Procedure for Disseration Defense</label>
                  <input type="checkbox" name="defense" id="defense" {{$applicant->defense ==1 ? 'checked' : ''}}>
                </div>
                <div>
                  <label for="notify">Notify Doctoral School to approve</label>
                  <input type="checkbox" name="notify" id="notify" {{$applicant->notify ==1 ? 'checked' : ''}}>
                </div>
                
                <div>
                  <label for="coordinator">Coordinator of the PhD</label>
                  <input type="checkbox" name="coordinator" id="coordinator" {{$applicant->coordinator == 1 ? 'checked' : ''}}>
                </div>
                <div>
                  <label for="deansoffice">Dean's Office</label>
                  <input type="checkbox" name="deansoffice" id="deansoffice" {{$applicant->deansoffice ==1 ? 'checked' : ''}}>
                </div>
                <div>
                  <label for="director">Director</label>
                  <input type="checkbox" name="director" id="director" {{$applicant->director ==1 ? 'checked' : ''}}>
                </div>
                <div>
                  <form action="{{ route('studentprogress.file' , $applicant->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <label for="test">upload file</label>
                    <input type="file" name="file" id="test">
                    <button type="submit" id="upload">Upload</button>
                  </form>
                </div>
            </div>
          </div>
        </div>
      </div>
</body>
      </html>
</x-layout>