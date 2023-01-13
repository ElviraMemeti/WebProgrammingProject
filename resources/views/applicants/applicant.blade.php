<x-layout>

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-x-auto ">
              <table class="min-w-full text-center data-table table-responsive ">
                <thead class="border-b bg-gray-800">
                  <tr>
                  <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                      ID
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                    Name&Surname
                    </th>
                    
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                      Student ID
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                      Faculty
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Programme
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Reg.Academic Year
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                        Email
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                       Phone
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                       Status
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                       Student Progress
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                       Edit
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                       Delete
                    </th>
                  </tr>
                </thead class="border-b">
                <tbody>
                @foreach($applicants as $applicant)
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{$applicant['Name']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{$applicant['StudentID']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{$applicant['Faculty']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['Programme']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['Academic_Year']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['Email']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['Phone']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['Status']}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('applicants', $applicant->StudentID) }}"
                        class="text-indigo-600 hover:text-indigo-900">
                        <x-svg.view/>
                    </a>
                    </td>
                    <td
                    class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                    <a href="/applicants/{{$applicant->id}}/edit"
                        class="text-indigo-600 hover:text-indigo-900">
                        <x-svg.edit/>
                    </a>
                    </td>

                    <td>
                      <form action="{{ route('applicants',$applicant->StudentID) }}" method="POST" onsubmit="return confirm('{{ trans(',are, You ,Sure ? ') }}' ">
                    
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="flex items-center">
                        <x-svg.delete/>
                    </button>
                    </form>
                    </td>

                  </tr>
                 
                @endforeach
                </tbody>
                
              </table>
            </div>
          </div>
        </div>
      </div>


<x-partials.buttonCard/>
</x-layout>
