@extends('layout')
@include('include.header')
@section('title', 'update task')
@section('content')

<div class="container">

@foreach($errors->all() as $error)

<div class="alert alert-warning" role="alert">
    {{$error}}
</div>

@endforeach

    <form action="/upTask" method="post">
    @csrf
     <input type="text" required name="updateField" class="form-control" style="margin-top:50px;" value="{{$taskdata->task_name}}">
     <input type="hidden" value="{{$taskdata->id}}" name="updateId">
     <br><br>
     <input type="submit" value="Update" class="btn btn-success" style="text-align:center;"> &nbsp
     <a href="/backToHome" class="btn btn-warning">Back</a>

    </form>
</div>
  
@endsection