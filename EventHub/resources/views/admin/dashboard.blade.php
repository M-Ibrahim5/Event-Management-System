@extends('layouts.adminmain')

@section('container')
    <h1>Admin Home</h1><br><br>

    <div class="Requests">
        <img class="upcomingImage" src="img/admin.jpg" alt="event">
        <br><br>
        <p>There are {{ $count }} pending requests</p>
        <a href="/requests" class="btn btn-primary">View</a>
    </div>
@endsection