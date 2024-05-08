@extends('layouts.main')

@section('container')

    <h1>Music Events</h1>
    <h4>{{ $eventName }}</h4> <!-- using blade templating engine -->
    <p>{{ $date }}</p>

@endsection     
