@extends('layouts.master')
@section('content')
<form action="{{route('updateTask', [$taskEdit->id])}}" method='POST' >

{{csrf_field() }}

           <div id="myDIV" class="header">
             <h2>My To Do List</h2>
             <input type="text" name="taskUpdate" value=' {{ $taskEdit->note }}'>
             <button type="submit" value='Save changes' class="addBtn">Sumbit</button>

           </div>
</form>
 @if (Session::has('success'))
     <div class="alert">
       <p class="successAdded"><strong>Success:</strong> {{Session::get('success')}}</p>
     </div>

 @endif
 @if(count($errors)>0)
   <div class="row">
       <div class="col-md-12">
           <div class="alert alert-danger">
               <ul>
                   @foreach($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
       </div>
   </div>
@endif

@endsection
