
<x-layout>
<!doctype html>
<html  lang="en">
<head>
   

   <style>


/* 

.search-container{
    background: #fff;
    height: 30px;
    border-radius: 30px;
    padding: 10px 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: 0.8s;
   
  box-shadow:  4px 4px 6px 0 rgba(255,255,255,.3),
              -4px -4px 6px 0 rgba(116, 125, 136, .2), 
    inset -4px -4px 6px 0 rgba(255,255,255,.2),
    inset 4px 4px 6px 0 rgba(0, 0, 0, .2);
}

.search-container:hover > .search-input{
    width: 400px;
}

.search-container .search-input{
    background: transparent;
    border: none;
    outline:none;
    width: 0px;
    font-weight: 500;
    font-size: 16px;
    transition: 0.8s;

}

.search-container .search-btn .fas{
    color: #5cbdbb;
} */

#search{
  border-radius: 10px;
  padding-left: 5px;

}

 input[type=text] {
  float: left;
  padding: 6px;
  border: none;
  margin-top: 8px;
  margin-right: 16px;
  font-size: 17px;

  border: 1px solid #ccc;
}


   </style>
</head>
</html>
<div>
  
   <form action="{{ route('search') }}" method="GET">
          <div class="search-container">
            <input type="text" name="search" id="search" placeholder="Search..." class="search-input" >
            <a href="#" class="search-btn">
              <i class="fas fa-search"></i>      
            </a>
         </div>

        </form>
<x-partials.buttonCard/>
</div>
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
                Name
                </th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                Last Name
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
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$applicant['id']}}</td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['name']}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['lastname']}}
                </td>

                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant['studentID']}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$applicant->faculty->name}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{$applicant->program->name}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{$applicant['academic_year']}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{$applicant['email']}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{$applicant['phone']}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{$applicant['status']}}
                </td>
                <td style=" position: relative" class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <a href="/applicants/studentprogres/{{$applicant->id}}"
                    class="text-indigo-600 hover:text-indigo-900">
                    <x-svg.view/>
                </a>
                </td>
                <td style=" position: relative"
                class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                <a href="/applicants/{{$applicant->id}}/edit"
                    class="text-indigo-600 hover:text-indigo-900">
                    <x-svg.edit/>
                </a>
                </td>

                <td>
                  <form method="POST" style=" position: relative" action="/applicants/{{$applicant->id}}"  >
                  @csrf
                  @method('DELETE')
                
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="flex items-center" onclick="return confirmDelete()">
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

  <script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this student?");
    }
</script>

</x-layout>
