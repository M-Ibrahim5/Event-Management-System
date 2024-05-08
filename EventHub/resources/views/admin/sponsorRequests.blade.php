@extends('layouts.adminmain')

@section('container')

    <div class="card">
        <div class="card-header">
            <h2>Sponsorship Requests</h2>
            <!--Search Bar-->
            <form class="d-flex" role="search" method="GET" action="{{ url('/sponsor2') }}">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                <button class="btn btn-outline-danger" type="a" href="{{ url('/sponsor2') }}"
                    style="margin-left: 10px">Clear</button>
            </form>
        </div>
    </div>
    @if ($data->count() == 0)
                        <tr><b>no sponsorship request application</b></tr>
                    @else
    <div class=allEvents>
        <table class="table table-bordered border-black">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Category</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">Price</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Event Status</th>
                    <th scope="col">Sponsor Status</th>
                    <th scope='col'>Action</th>
            </thead>
            <tbody class="table-group-divider">
                
                    @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->eventName }}</td>
                            <td>{{ $data->eventLocation }}</td>
                            <td>{{ $data->eventCategory }}</td>
                            <td>{{ $data->eventStartDate->format('F j, Y') }}</td>
                            <td>{{ $data->eventPrice }}</td>
                            <td>{{ $data->eventCapacity }}</td>
                            <td>{{ $data->eventStatus }}</td>
                            <td>{{ $data->sponsorStatus }}</td>

                            <td>
                                <div style="white-space: nowrap;">
                                    <form action="{{ url('updateSponsorStatus/' . $data->id . '/accepted') }}" method="POST"
                                        style="display: inline-block; margin-right: 10px;">
                                        @csrf
                                        <button type='submit' class="btn btn-success btn-large" data-toggle="tooltip"
                                            id="accept">
                                            Accept
                                        </button>
                                    </form>

                                    <form action="{{ url('updateSponsorStatus/' . $data->id . '/rejected') }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        <button type='submit' class="btn btn-danger btn-large" data-toggle="tooltip"
                                            id="reject">
                                            Reject
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>

    </div>
@endsection
