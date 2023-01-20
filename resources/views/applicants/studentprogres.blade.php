<x-layout>

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-x-auto ">
                <h1>{{ $applicant->name }}({{ $applicant->studentID }})</h1>
                <p>{{ $applicant->faculty->name }}-{{ $applicant->program->name }}({{ $applicant->academic_year }})</p>
                <p class="teachername">{{ $teacher->name }}</p>
                <p>Number of Credits Awarded <span>{{ $applicant->exams_passed * 5 }}</span></p>
                <p>Number of Passed Exams <span>{{ $applicant->exams_passed }}</span></p>
                <div>
                  <label for="review">Review and Approval of the Doctoral Dissertation Plan</label>
                  <input type="checkbox" name="review" id="review" {{$applicant->review == 1 ? 'checked' : ''}}>
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
                  <label for="defense">Starting Procedure for Disseration Defense</label>
                  <input type="checkbox" name="defense" id="defense" {{$applicant->defense ==1 ? 'checked' : ''}}>
                </div>
                <div>
                  <label for="notify">Notify Doctoral School to approve</label>
                  <input type="checkbox" name="notify" id="notify" {{$applicant->notify ==1 ? 'checked' : ''}}>
                </div>
                <div>
                  <p>Please click Complete if the student has no debt and upload the transcript. If not please select Reject</p>
                  <button>Complete</button> <button>Reject</button>
                </div>
                <div>
                  <form action="{{ route('studentprogress.file' , $applicant->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <label for="test">upload file</label>
                    <input type="file" name="file" id="test">
                    <button type="submit">Upload</button>
                  </form>
                </div>
            </div>
          </div>
        </div>
      </div>
</x-layout>