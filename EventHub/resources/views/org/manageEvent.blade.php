<!--Extending template layout-->
@extends('layouts.orgmain')

@section('container')

<h3>Manage Your event</h3><br>

<!--create event button-->
<a href="{{ route('organization.createEvent')}}">
    <button type="button" class="btn btn-info mb-3">Create Event</button>
</a>

<!--alert-->
@if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
@endif

<!--event table-->

    <table class="table">
    <thead class="table-dark">
        <th scope="col">#</th>
      <th scope="col">Event</th>
      <th scope="col">Date</th>
      <th scope="col">Location</th>
      <th scope="col">EventStatus</th>
      <th scope="col">SponsorStatus</th>
      <th scope="col"></th>
    </thead>
    <tbody>
        @foreach ($events as $index => $event)
            <tr>
            <th scope="row">{{ $index + 1 }}</th>
            <td>{{ $event->eventName }}</td>
            <td>{{ $event->eventStartDate->format('F j, Y') }}</td>
            <td>{{ $event->eventLocation }}</td>
            <td>{{ $event->eventStatus }}</td>
            <td>{{ $event->sponsorStatus }}</td>
            <td>
                <a href="/getEvent/{{ $event->id }}">
                    <button type="button" class="btn btn-warning mb-1" style="width: 80px;">Edit</button>
                </a>
                    <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 80px;">Delete</button>
            </td>
            </tr>
        @endforeach
    </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Event</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Please be advised that if you proceed to delete this event, any funds collected from ticket purchases will be irreversibly forfeited. Consider the financial impact on attendees before finalizing this action.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            @if(isset($event))
                <a href="/deleteEvent/{{ $event->id }}">
                    <button type="button" class="btn btn-danger mb-1" style="width: 80px;">Delete</button>
                </a>
            @endif
        </div>
        </div>
    </div>
    </div>
@endsection  