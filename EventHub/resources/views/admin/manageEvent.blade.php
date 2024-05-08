@extends('layouts.adminmain')

@section('container')
<div class="card">
    <div class="card-header">
        <h2>
            Events
            <a href='/createevent' class="btn btn-success float-end">Add Event</a>
            <br>
        </h2> 
        <!--Search Bar-->
        <form class="d-flex" role="search" method="GET" action="{{ url('/events') }}">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
            <button class="btn btn-outline-danger" type="a" href="{{ url('/events') }}" style="margin-left: 10px">Clear</button>
        </form>
    </div>
</div>

    <div class = allEvents>
        @if (session('status'))
            <h6 class="alert alert-danger">{{ session('status') }}</h6>
        @endif
    

        <table class="table table-bordered border-black">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Category</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End Time</th>
                    <th scope="col">Price</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Status</th>
                    <th scope='col'>Action</th>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($data as $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td><a href="{{ url('editevent/'.$data->id) }}">{{ $data->eventName }}</a></td>
                        <td>{{ $data->eventLocation }}</td>
                        <td>{{ $data->eventCategory }}</td>
                        <td>{{ $data->eventStartDate->format('F j, Y') }}</td>
                        <td>{{ $data->eventEndDate->format('F j, Y') }}</td>
                        <td>{{ $data->eventStartTime->format('g:i A') }}</td>
                        <td>{{ $data->eventEndTime->format('g:i A') }}</td>
                        <td>{{ $data->eventPrice }}</td>
                        <td>{{ $data->eventCapacity }}</td>
                        <td>{{ $data->eventStatus }}</td>
                        
                        <td>
                            <form action="{{ url('deleteevent/'.$data->id) }}" method="POST" style="display: inline-block;margin-bottom:1em;">
                                @csrf
                                @method('delete')
                                
                                <button type='submit' class="btn btn-danger btn-sm" data-toggle="tooltip" >
                                    Delete
                                </button>
                            </form>
                            <form action="{{ url('report/'.$data->id) }}" method="GET" style="display: inline-block;">
                                @csrf
                                
                                <button type='submit' class="btn btn-warning btn-sm" data-toggle="tooltip">
                                    View
                                </button>
                            </form>

                            <form action="/editevent/{{ $data->id }}" method="GET" style="display: inline-block;">
                                @csrf
                                <button type='submit' class="btn btn-warning btn-sm" data-toggle="tooltip">
                                    Edit
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
@endsection