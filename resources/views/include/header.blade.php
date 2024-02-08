<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}">My App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
    


        <li class="nav-item">

        <a class="nav-link" href="{{route('taskView')}}">Tasks</a>

        </li>

        <!-- <li class="nav-item">

          <a class="nav-link" href="{{route('profile')}}">Profile</a>
          
        </li> -->
        <li class="nav-item">
         <form action="{{route('logout')}}" method="post">
          @csrf 

          <button class="btn btn-clear" type="submit">Logout</button>

         </form>
        </li>
      </ul>
     
    </div>
    <span class="nav-link" style="justify-content: space-between;">
    @auth
    {{auth()->user()->name}}
    @endauth
  </span>
  </div>

</nav>