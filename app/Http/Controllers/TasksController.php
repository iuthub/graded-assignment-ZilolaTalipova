<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;
use Session;

class TasksController extends Controller
{

  public function getIndex()
     {
         return view('home.index', ['users' => User::orderBy('name','desc')->get()
     ]);

public function index()
{
  $tasks= Task::orderBy('created_at', 'desc')->get();
  return view('Task.index')->with('tasks', $tasks);
}

  public function store(Request $request){
    $this->validate($request, [
      'task'=>'required|min:5|max:255'
    ]);
    $task=$request['task'];
    $objTask= new Task();
    $objTask->note=$task;
    $objTask->save();
    Session::flash('success', 'New task is added successfully!');
    return redirect()->back();
  }

  public function edit($id)
  {
    $task= Task::find($id);
    return view('Task.edit')->with('taskEdit', $task);
  }
  public function update( Request $request, $id)
  {
    $this->validate($request, [
      'taskUpdate'=>'required|min:5|max:255'
    ]);
    $task= Task::find($id);
    $task->note = $request['taskUpdate'];
    $task->save();
    Session::flash('success', 'Task has been succesfully deleted!');
    return redirect()->route('Task.index');
  }

  public function destroy($id)
  {
    $task= Task::where('id', $id)->first();
    $task->delete();
    Session::flash('success', 'Task has been succesfully updated!');
    return redirect()->back();
  }


}
