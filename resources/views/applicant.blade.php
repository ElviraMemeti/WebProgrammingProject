<x-layout>
    <!-- <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full text-center">
                <thead class="border-b bg-gray-800">
                  <tr>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                      #
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                      Mentor
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                      Faculty
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                      Academic Title
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Accreditation Date
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Accreditation Number
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Re-Accreditation Date
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Re-Accreditation Number
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Available Places
                    </th>
                  </tr>
                </thead class="border-b">
                <tbody>
                @foreach($applicants as $applicant)
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{$applicant['AppId']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{$applicant['Name']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{$applicant['Surname']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['Date_of_birth']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['City']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['Country']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['Faculty']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['Study_program']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['Email']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['Phone1']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['Phone2']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['Study_language']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['TOEFL']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['TOEFL_Score']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['TOEFL_Date']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['Model_of_UGS']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['UGS_outside_RM']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['UGS_Nostrification']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['UGS_Nostrification_Date']}}
                    </td>
                    
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['UGS_Institution_Name']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['UGS_Study_Program']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['UGS_Title']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['UGS_GPA']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['Model_of_MA_Studies']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['MA_in_English']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['MA_Outside_RM']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['MA_Nostrification']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['MA_Nostrification_date']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['MA_Study_Program']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['MA_Country']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['MA_Title']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['MAS_GPA']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['UGS_in_English']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['MA_Institution_Name']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['SP_Code']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['Application_Date']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['Accepted']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['App_Year']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['ID_Number']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['AppTerm']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['UGS_Country']}}
                    </td>
                    </td>
                    td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{$applicant['UND_ECTS']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{$applicant['MAS_ECTS']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{$applicant['UGS+MA_ECTS']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{$applicant['ENTRY_LEVEL']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{$applicant['SPNAME_SPCODE']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{$applicant['DATE/MONTH/YEAR']}}
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> -->

</x-layout>