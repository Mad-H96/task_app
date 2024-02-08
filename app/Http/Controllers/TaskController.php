<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\task;


class TaskController extends Controller
{



    function TaskView(){
        $data = task::all();
        return view('task')->with('tasks',$data);
    }


    function SaveTask(Request $request){

        $task = new task;

        $this->validate($request,[
            'task_field'=>'required|max:200|min:5',
        ]);

        $task->task_name=$request->task_field;
        $task->save();

        $dataTask = task::all();
        return view('task')->with('tasks', $dataTask);
        // dd($request->all());
    }



    function markCompleted($id){

        $task=task::find($id);
        $task->is_completed=1;
        $task->save();
        return redirect()->back();

    }



    function markNotCompleted($id){
        $task=task::find($id);
        $task->is_completed=0;
        $task->save();
        return redirect()->back(); 
    }



    function DeleteTask($id){
        $task=task::find($id);
        $task->delete();
        return redirect()->back();


    }


    function UpdateTask($id){
        $task=task::find($id);
        return view('UpdateTask')->with('taskdata', $task);
    }


    function UpdateTaskNow(Request $request){

            $id=$request->updateId;
            $task=$request->updateField;

            $data=task::find($id);
            $data->task_name=$task;
            $data->save();

            $data = task::all();
            return redirect()->route('taskView')->with('tasks',$data);
            
    }



    function backHome(){

        $data = task::all();
        return view('task')->with('tasks',$data);
        
    }

}
