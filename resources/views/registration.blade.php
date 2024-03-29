@extends('layout')
@section('title', 'Register')
@section('content')

<div class="container" >

<div class="mt-3">

@if($errors->any())
     <div class="col-12">
        @foreach($errors->all() as $error)
          <div class="alert alert-danger">
              {{$error}}
          </div>
        @endforeach
     </div>
@endif

@if(session()->has('error'))

        <div class="alert alert-danger"> {{session('error')}} </div>

@endif

@if(session()->has('success'))

        <div class="alert alert-success"> {{session('success')}} </div>

@endif
</div>


<form action="{{route('register.post')}}" method="post" style="margin: auto;width: 50%;margin-top:100px;">
@csrf
<div class="mb-3">
    <label class="form-label">Full Name</label>
    <input type="text" class="form-control" name="name">
</div>


<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email">
</div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
</div>

  <button type="submit" class="btn btn-primary">Register</button>
  <br><br>
  <a href="{{route('login')}}">Back</a>

</form>

</div>



@endsection

