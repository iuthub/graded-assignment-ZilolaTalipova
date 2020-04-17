@extends('layouts.master')
@section('content')
@if(Session::has('info'))
    <div class ="row" >
        <div class =" col-md-12 " >
        <p class = " alert alert-info " >{{ Session::get ('info') }} </p >
        </div >
    </div >
@endif
 <form action="{{ route('createTask') }}" method="post">
            <div id="myDIV" class="header">
              <h2>My To Do List</h2>
              <input type="text" name="task" id="task" placeholder="Title...">

              <input type="hidden" name="_token" value="{{ Session::token() }}">
              <button type="submit" class="addBtn">Add</button>

            </div>
</form>
  @if (Session::has('success'))
      <div class="alert">
        <p style=" color:blue;" class="successAdded"><strong>Success:</strong> {{Session::get('success')}}</p>
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
@if(count($tasks)>0)

@foreach($tasks as $task)
        <ul id="myUL">
          <li>
            <div class="task">
        <p>  {{$task->note}}</p>
            </div>
            <div class="action">
                <a href="{{route('editTask', ['task_id'=> $task->id])}} "><i class="fa fa-edit"></i></a>
            </div>
            <div class="action">
                <a href="{{route('deleteTask', ['task_id'=> $task->id])}}"><i class="fa fa-trash-alt"></i></a>
            </div>
          </li>

@endforeach
@endif
          <li>
            <div class="task">
               Make some food
            </div>
            <div class="action">
                <a href=""><i class="fa fa-edit"></i></a>
            </div>
            <div class="action">
                <a href=""><i class="fa fa-trash-alt"></i></a>
            </div>
          </li>
          <li>
            <div class="task">
               Finish quiz
            </div>
            <div class="action">
                <a href=""><i class="fa fa-edit"></i></a>
            </div>
            <div class="action">
                <a href=""><i class="fa fa-trash-alt"></i></a>
            </div>
          </li>
        </ul>
  @endsection
