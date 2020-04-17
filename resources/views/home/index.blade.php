@extends('layouts.master')

@section('content')

		<div id="myDIV" class="header">
		  <h2>Users To Do List</h2>
		</div>

<ul id="myUL">
	@foreach($tasks ?? '' as $task)
		<li>
            {{$task->name}}'s list of tasks
        </li>
	 @endforeach
</ul>
@endsection
