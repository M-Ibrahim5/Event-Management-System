@extends('layouts.orgmain')

@section('title', 'Your events · EventHub')

@section('container')
    <div class="eh-pagehead">
        <div>
            <h1>Your events</h1>
            <p>Track approval, edit details and delete events you organize.</p>
        </div>
        <!-- Create event button -->
        <form action="{{ route('organization.createEvent') }}" method="GET">
            <button type="submit" class="btn btn-primary">Create Event</button>
        </form>
    </div>

    <!-- Alert -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="status">{{ $message }}</div>
    @endif

    @if ($events->isEmpty())
        <p class="eh-empty">You haven't created an event yet. Use Create Event to submit your first one for review.</p>
    @else
        <!-- Event table -->
        <div class="eh-panel">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Event</th>
                        <th scope="col">Date</th>
                        <th scope="col">Location</th>
                        <th scope="col">Event status</th>
                        <th scope="col">Sponsor status</th>
                        <th scope="col"><span class="visually-hidden">Actions</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $index => $event)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $event->eventName }}</td>
                            <td class="eh-nowrap">{{ $event->eventStartDate->format('j M Y') }}</td>
                            <td>{{ $event->eventLocation }}</td>
                            <td><span class="eh-status eh-status--{{ strtolower($event->eventStatus) }}">{{ $event->eventStatus }}</span></td>
                            <td><span class="eh-status eh-status--{{ strtolower($event->sponsorStatus) }}">{{ $event->sponsorStatus }}</span></td>
                            <td>
                                <div class="eh-actions-cell">
                                    <a href="/getEvent/{{ $event->id }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop-{{ $event->id }}">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <!-- Modals -->
    @foreach ($events as $event)
        <div class="modal fade" id="staticBackdrop-{{ $event->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel-{{ $event->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel-{{ $event->id }}">Delete &ldquo;{{ $event->eventName }}&rdquo;?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-0">If you delete this event, any money collected from ticket purchases is forfeited
                            and can't be recovered. Think about the impact on attendees before you continue.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Keep event</button>
                        <a href="/deleteEvent/{{ $event->id }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
