@if(session()->has('message'))

<div x-data="{show:true}" x-init="setTimeout(()=> show=false, 3000)" x-show="show" class="fixed top-0   text-white px-48 py-3" 
style=" padding: 20px; background-color: #152238;  position: absolute;
  top: 5%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-weight:bold; 
  ">

<p>
    {{session('message')}}
</p>
</div>

@endif