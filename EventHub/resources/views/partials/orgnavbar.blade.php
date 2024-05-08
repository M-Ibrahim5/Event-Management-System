    <!-- partial navbar (specific) -->
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/organization">EventHub</a>

    <!--Search Bar-->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            @guest
            <li class="nav-item">
                <a class="nav-link" href="/login">Log In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/signup">Sign Up</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('organization.createEvent') }}">Create</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="{{ asset('img/user.png') }}" alt="user" width="20"> {{ Auth::user()->email }} <img src="{{ asset('img/down-arrow.png') }}" alt="downarrow" width="20"></a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/">Switch to attending</a></li>
                    <li><a class="dropdown-item" href="/logout">Log out</a>
                </ul>
            </li>    
            @endguest
        </ul>
    </div>
  </div>
</nav>

<div id="activenavbar">
 <!-- <a href="#" class="w3-bar-item w3-button"><i class="fa fa-home"></i></a> -->
  <a href="{{ route('organizationhome') }}" class="btn btn-outline-dark">Home</a> 
  <a href="{{ route('organization.showEvent') }}" class="btn btn-outline-dark">Events</a> 
</div>