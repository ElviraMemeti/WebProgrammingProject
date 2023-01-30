<x-layout>
    <!DOCTYPE html>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <style>
            .teachername {
                float: right;


            }

            .number {
                border-top: medium;
                border-style: groove;
            }

            .review {
                border-top: medium;
                border-bottom: medium;
                border-style: groove;
            }

            .line {
                border-top: medium;
                border-style: groove;
                margin-top: 40px;

            }

            .line p {
                margin-top: 40px;
            }

            .button {
                background-color: #4CAF50;
                /* Green */
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
                -webkit-transition-duration: 0.4s;
                /* Safari */
                transition-duration: 0.4s;
                width: 120px;
            }

            .button {
                box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2), 0 5px 10px 0 rgba(0, 0, 0, 0.19);
            }

            .button2 {
                background-color: rgb(166, 0, 0);
                left: 40%;
            }

            .box {
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

            .box2 {
                margin: 4px 2px;
                padding: 4px 29px;
                margin-left: 11px;

            }

            #review {
                margin-left: 10px;
            }

            .linee {
                margin-left: 25%;
            }

            #defense {
                margin-left: 11px;
                margin-top: 12px;
            }

            #notify {
                margin-left: 72px;
            }

            #coordinator {
                margin-left: 144px;
            }

            #deansoffice {
                margin-left: 209px;
            }

            #director {
                margin-left: 244px;
            }

            #upload {
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
            
           .divW{
            width: auto;
           }
            
            .scroll-container {
                  height: 492px;
                  width: auto;
                  overflow-y: scroll;
                }

               


        </style>
    </head>

    <body ><div class="scroll-container">
        <div class="flex flex-col">
            <div class=" sm:-mx-6 lg:-mx-8">
                <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="divW ">
                        <h1>{{ $applicant->name }}({{ $applicant->studentID }})</h1>
                        <p class="teachername">{{ $teacher->name }}</p>
                        <p>{{ $applicant->faculty->name }}-{{ $applicant->program->name }}({{ $applicant->academic_year }})
                        </p>
                        <div class="number">
                            <p>Number of Credits Awarded <span class="box box1">{{ $applicant->exams_passed * 5 }}</span>
                            </p>
                            <p>Number of Passed Exams <span class="box box2">{{ $applicant->exams_passed }}</span></p>
                        </div>
                        <form id="completedebt" method="POST" action="{{ route('studentprogres.completedebt' , $applicant->id) }}">
                          @csrf 
                        </form>
                        <form id="rejectdebt" method="POST" action="{{ route('studentprogres.rejectdebt' , $applicant->id) }}">
                          @csrf 
                        </form>
                        <form id="transcriptform" method="POST" action="{{ route('studentprogres.transcript' , $applicant->id) }}">
                          @csrf 
                          <input type="hidden" value="transcript" name="transcript">
                        </form>
                        
                        <form id="presentationform" method="POST" action="{{ route('studentprogres.presentation1' , $applicant->id) }}">
                          @csrf 
                          <input type="hidden" value="presentation1" name="presentation1">
                        </form> 

                         <form id="presentationform2" method="POST" action="{{ route('studentprogres.presentation2' , $applicant->id) }}">
                          @csrf 
                          <input type="hidden" value="presentation2" name="presentation2">
                        </form>

                        <form id="evidenceform" method="POST" action="{{ route('studentprogres.evidence' , $applicant->id) }}">
                          @csrf 
                          <input type="hidden" value="evidence" name="evidence">
                        </form>

                        <form id="approvalform" method="POST" action="{{ route('studentprogres.approval' , $applicant->id) }}">
                          @csrf 
                          <input type="hidden" value="approval" name="approval">
                        </form>

                        <form id="defirstpresentationform" method="POST" action="{{ route('studentprogres.defirstpresentation' , $applicant->id) }}">
                          @csrf 
                          <input type="hidden" value="defirstpresentation" name="defirstpresentation">
                        </form>

                        <form id="progresreportform" method="POST" action="{{ route('studentprogres.progresreport' , $applicant->id) }}">
                          @csrf 
                          <input type="hidden" value="progresreport" name="progresreport">
                        </form>

                        <form id="desecondpresentationform" method="POST" action="{{ route('studentprogres.desecondpresentation' , $applicant->id) }}">
                          @csrf 
                          <input type="hidden" value="desecondpresentation" name="desecondpresentation">
                        </form>

                        <form id="gradetranscriptform" method="POST" action="{{ route('studentprogres.gradetranscript' , $applicant->id) }}">
                          @csrf 
                          <input type="hidden" value="gradetranscript" name="gradetranscript">
                        </form>

                        <form id="thesisform" method="POST" action="{{ route('studentprogres.thesis' , $applicant->id) }}">
                          @csrf 
                          <input type="hidden" value="thesis" name="thesis">
                        </form>

                        <form id="plagiarismform" method="POST" action="{{ route('studentprogres.plagiarism' , $applicant->id) }}">
                          @csrf 
                          <input type="hidden" value="plagiarism" name="plagiarism">
                        </form>

                        <form id="mentorreportform" method="POST" action="{{ route('studentprogres.mentorreport' , $applicant->id) }}">
                          @csrf 
                          <input type="hidden" value="mentorreport" name="mentorreport">
                        </form>

                        <form id="mrform" method="POST" action="{{ route('studentprogres.mr' , $applicant->id) }}">
                          @csrf 
                          <input type="hidden" value="mr" name="mr">
                        </form>

                        <form action="{{ route('studentprogress.file', $applicant->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="review">
                                <label for="review">Review and Approval of the Doctoral Dissertation Plan</label>
                                <input type="checkbox" name="review" id="review"
                                    {{ $applicant->review == 1 ? 'checked' : '' }}>
                            </div>
                            <div class="linee">
                                <p>Please click Complete if the student has no debt and upload the transcript. If not
                                    please select Reject</p>
                            </div>
                            <div>
                                <button class="button button1" type="submit" form="completedebt">Complete</button> 
                                <button class="button button2" type="submit" form="rejectdebt">Reject</button>
                            </div>
                            <div>
                                <label for="defense">Starting Procedure for Disseration Defense</label>
                                <input type="checkbox" name="defense" id="defense"
                                    {{ $applicant->defense == 1 ? 'checked' : '' }}>
                            </div>
                            <div>
                                <label for="notify">Notify Doctoral School to approve</label>
                                <input type="checkbox" name="notify" id="notify"
                                    {{ $applicant->notify == 1 ? 'checked' : '' }}>
                            </div>
                            <div>
                                <label for="coordinator">Coordinator of the PhD</label>
                                <input type="checkbox" name="coordinator" id="coordinator"
                                    {{ $applicant->coordinator == 1 ? 'checked' : '' }}>
                            </div>
                            <div>
                                <label for="deansoffice">Dean's Office</label>
                                <input type="checkbox" name="deansoffice" id="deansoffice"
                                    {{ $applicant->deansoffice == 1 ? 'checked' : '' }}>
                            </div>
                            <div>
                                <label for="director">Director</label>
                                <input type="checkbox" name="director" id="director"
                                    {{ $applicant->director == 1 ? 'checked' : '' }}>
                            </div>
                            <div>

                                <label for="test">Upload Transcript</label>
                                <input type="file" name="transcript" id="transcript">
                                <p>{{ $applicant->transcript }}</p>
                                <input type="submit" form="transcriptform" value="delete">
                            </div>
                            <div>

                                <label for="test">Upload First Presentation</label>
                                <input type="file" name="presentation1" id="presentation1">
                                <p>{{ $applicant->presentation1 }}</p>
                                <input type="submit" form="presentationform" value="delete">
                                <a href="{{ route('firstpresentationdownload', ['name' => $applicant->name, 'id' => $applicant->studentID]) }}"
                                    class="btn btn-primary">Download first presantation here</a>
                            </div>
                            <div>
                                <label for="test">Upload Second Presentation</label>
                                <input type="file" name="presentation2" id="presentation2">
                                <p>{{ $applicant->presentation2 }}</p>
                                <input type="submit" form="presentationform2" value="delete">
                                <a href="{{ route('secondpresentationdownload', ['name' => $applicant->name, 'id' => $applicant->studentID]) }}"
                                    class="btn btn-primary">Download second presantation here</a>
                            </div>
                            <div>
                                <label for="test">Evidence for presentation at conferences</label>
                                <input type="file" name="evidence" id="evidence">
                                <p>{{ $applicant->evidence }}</p>
                                <input type="submit" form="evidenceform" value="delete">
                                <a href="{{ route('evidencedownload', ['name' => $applicant->name, 'id' => $applicant->studentID]) }}"
                                    class="btn btn-primary">Download Evidence for presentation at conferences</a>
                            </div>
                            <div>
                              <label for="test">Upload the Decision on the Approval of Thesis</label>
                              <input type="file" name="approval" id="approval">
                              <p>{{ $applicant->approval }}</p>
                              <input type="submit" form="approvalform" value="delete">
                              <a href="{{ route('approvaldownload', ['name' => $applicant->name, 'id' => $applicant->studentID]) }}"
                                  class="btn btn-primary">Download the Decision on the Approval of Thesis</a>
                          </div>
                            <div>
                              <label for="test">Upload The Decision of the First Presentation</label>
                              <input type="file" name="defirstpresentation" id="defirstpresentation">
                              <p>{{ $applicant->defirstpresentation }}</p>
                              <input type="submit" form="defirstpresentationform" value="delete">
                              <a href="{{ route('defirstpresentationdownload', ['name' => $applicant->name, 'id' => $applicant->studentID]) }}"
                                  class="btn btn-primary">Download the Decision of the First Presentation</a>
                          </div>
                            <div>
                              <label for="test">Upload First Progress Report</label>
                              <input type="file" name="progresreport" id="progresreport">
                              <p>{{ $applicant->progresreport }}</p>
                              <input type="submit" form="progresreportform" value="delete">
                              <a href="{{ route('progresreportndownload', ['name' => $applicant->name, 'id' => $applicant->studentID]) }}"
                                  class="btn btn-primary">Download First Progress Report</a>
                          </div>
                            <div>
                              <label for="test">Upload The Decision of the Second Presentation</label>
                              <input type="file" name="desecondpresentation" id="desecondpresentation">
                              <p>{{ $applicant->desecondpresentation }}</p>
                              <input type="submit" form="desecondpresentationform" value="delete">
                              <a href="{{ route('desecondpresentationndownload', ['name' => $applicant->name, 'id' => $applicant->studentID]) }}"
                                  class="btn btn-primary">Download the Decision of the Second Presentation</a>
                          </div>
                            <div>
                              <label for="test">Transcript of grades</label>
                              <input type="file" name="gradetranscript" id="gradetranscript">
                              <p>{{ $applicant->gradetranscript }}</p>
                              <input type="submit" form="gradetranscriptform" value="delete">
                              <a href="{{ route('gradetranscriptndownload', ['name' => $applicant->name, 'id' => $applicant->studentID]) }}"
                                  class="btn btn-primary">Download Transcript of grades</a>
                          </div>
                            <div>
                              <label for="test">Upload Thesis Documentation</label>
                              <input type="file" name="thesis" id="thesis">
                              <p>{{ $applicant->thesis }}</p>
                              <input type="submit" form="thesisform" value="delete">
                              <a href="{{ route('thesisndownload', ['name' => $applicant->name, 'id' => $applicant->studentID]) }}"
                                  class="btn btn-primary">Download Thesis Documentation</a>
                          </div>
                            <div>
                              <label for="test">Upload Google Plagiarism Report</label>
                              <input type="file" name="plagiarism" id="plagiarism">
                              <p>{{ $applicant->plagiarism }}</p>
                              <input type="submit" form="plagiarismform" value="delete">
                              <a href="{{ route('plagiarismndownload', ['name' => $applicant->name, 'id' => $applicant->studentID]) }}"
                                  class="btn btn-primary">Download Google Plagiarism Report</a>
                          </div>
                            <div>
                              <label for="test">Decision for Mentoring Report</label>
                              <input type="file" name="mentorreport" id="mentorreport">
                              <p>{{ $applicant->mentorreport }}</p>
                              <input type="submit" form="mentorreportform" value="delete">
                              <a href="{{ route('mentorreportndownload', ['name' => $applicant->name, 'id' => $applicant->studentID]) }}"
                                  class="btn btn-primary">Download Decision for Mentoring Report</a>
                          </div>
                            <div>
                              <label for="test">Mentoring Report</label>
                              <input type="file" name="mr" id="mr">
                              <p>{{ $applicant->mr }}</p>
                              <input type="submit" form="mrform" value="delete">
                              <a href="{{ route('mrndownload', ['name' => $applicant->name, 'id' => $applicant->studentID]) }}"
                                  class="btn btn-primary">Download Mentoring Report</a>
                          </div>
                          <div>
                            <label for="deansoffice">Starting Procedure for Dissertation Defense</label>
                            <input type="checkbox" name="dissertation" id="dissertation"
                                {{ $applicant->dissertation == 1 ? 'checked' : '' }}>
                        </div>
                            <button type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>  </div>
    </body>

    </html>
</x-layout>
