@extends('layout')
@section('title', 'Task')
@section('content')
@include('include.header')


<div class="container">
<h3 style="text-align:center;margin-top:20px;">Daily Task App</h3>
<div style="margin-top:20px;">
<div class="mb-3">

@foreach($errors->all() as $error)

<div class="alert alert-warning" role="alert">
    {{$error}}
</div>

@endforeach

<form action="{{route('saveTask')}}" method="post">
    @csrf
    <input type="text" class="form-control" name="task_field" placeholder="Enter your task here">
    <br>
    <div style="text-align:center">
    <button type="submit" class="btn btn-primary">Save</button>
    <button type="button" class="btn btn-warning">Clear</button>
    </div>

    <div style="margin-top:30px">
    <table class="table table-striped" style="text-align:center;">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Task</th>
      <th scope="col">Completed</th>
      <th scope="col">Action</th>
      <th scope="col">Delete</th>
      <th scope="col">Update</th>
    </tr>
  </thead>
  <tbody >
    @foreach($tasks as $data) 
    <tr>
    <td>{{$data->id}}</td>
    <td>{{$data->task_name}}</td>


    <td>
    @if($data->is_completed)
    <button class="btn btn-success">Completed</button>
    @else
    <button class="btn btn-warning">Not Completed</button>
    @endif
    </td>

    <td>
      @if(!$data->is_completed)
      <a href="/markAsCompleted/{{$data->id}}" class="btn btn-primary">Mark as Completed</a></td>
      @else
      <a href="/markAsNotCompleted/{{$data->id}}" class="btn btn-danger">Mark as Not Completed</a></td>
      @endif


    <td>
    <a href="/taskDelete/{{$data->id}}" class="btn btn-danger">Delete</a></td>
    </td>

    <td>
    <a href="/taskUpdate/{{$data->id}}" class="btn btn-warning">Update</a></td>
    </td>

    </tr>
    @endforeach
  
  </tbody>
</table>
    </div>


</form>
</div>
<div class="mb-3">
</div>
</div>
