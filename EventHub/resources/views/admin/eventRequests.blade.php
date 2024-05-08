@extends('layouts.adminmain')

@section('container')

<div class="card">
    <div class="card-header">
        <h2>Event Requests</h2> 
        <!--Search Bar-->
        <form class="d-flex" role="search" method="GET" action="{{ url('/requests') }}">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
            <button class="btn btn-outline-danger" type="a" href="{{ url('/requests') }}" style="margin-left: 10px">Clear</button>
        </form>
    </div>
</div>

<div class = allEvents>
    <table class="table table-bordered border-black">
        <thead>
            <tr>
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
                    <td>{{ $data->eventName }}</td>
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
                        <form action="{{ url('details/'.$data->id) }}" method="POST">
                        @csrf
                        
                        <button type='submit' class="btn btn-primary btn-sm" data-toggle="tooltip">
                            View
                        </button>
                        </form>
                        <form action="{{ url('updateStatus/' . $data->id . '/accepted') }}" method="POST"
                            style="display: inline-block; margin-right: 10px;">
                            @csrf
                            <button type='submit' class="btn btn-success btn-large" data-toggle="tooltip"
                                id="accept">
                                Accept
                            </button>
                        </form>

                        <form action="{{ url('updateStatus/' . $data->id . '/rejected') }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            <button type='submit' class="btn btn-danger btn-large" data-toggle="tooltip"
                                id="reject">
                                Reject
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection