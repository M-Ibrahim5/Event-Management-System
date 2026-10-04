@extends('layouts.adminmain')

@section('title', 'Edit event · EventHub Admin')

@section('container')
    <div class="eh-form-card">
        <a href="{{ url('events') }}" class="eh-back">&larr; Back to events</a>

        <div class="eh-pagehead">
            <div>
                <h1>Edit &amp; Update Event</h1>
                <p>{{ $event->eventName }}</p>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="status">{{ session('status') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ url('updateevent/' . $event->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @if ($event->imagePath)
                        <div class="mb-3">
                            <span class="form-label">Event image</span>
                            <img class="eh-imgpreview mt-0" src="{{ asset($event->imagePath) }}" alt="Current event image" onerror="this.remove()">
                            <p class="eh-help">The organizer changes the image from their own edit page.</p>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="eventName" class="form-label">Event name</label>
                        <input type="text" id="eventName" name="eventName" value="{{ old('eventName', $event->eventName) }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="eventDescription" class="form-label">Description</label>
                        <textarea id="eventDescription" name="eventDescription" rows="4" class="form-control">{{ old('eventDescription', $event->eventDescription) }}</textarea>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="eventLocation" class="form-label">Location</label>
                            <input type="text" id="eventLocation" name="eventLocation" value="{{ old('eventLocation', $event->eventLocation) }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="eventCategory" class="form-label">Category</label>
                            <input type="text" id="eventCategory" name="eventCategory" list="eventCategories" autocomplete="off"
                                value="{{ old('eventCategory', $event->eventCategory) }}" class="form-control">
                            <datalist id="eventCategories">
                                @foreach (['Music', 'Technology', 'Education', 'Sports', 'Wedding', 'Art'] as $category)
                                    <option value="{{ $category }}"></option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-sm-6">
                            <label for="eventStartDate" class="form-label">Start date</label>
                            <input type="date" id="eventStartDate" name="eventStartDate" value="{{ old('eventStartDate', $event->eventStartDate->format('Y-m-d')) }}" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label for="eventStartTime" class="form-label">Start time</label>
                            <input type="time" id="eventStartTime" name="eventStartTime" value="{{ old('eventStartTime', $event->eventStartTime->format('H:i')) }}" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label for="eventEndDate" class="form-label">End date</label>
                            <input type="date" id="eventEndDate" name="eventEndDate" value="{{ old('eventEndDate', $event->eventEndDate->format('Y-m-d')) }}" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label for="eventEndTime" class="form-label">End time</label>
                            <input type="time" id="eventEndTime" name="eventEndTime" value="{{ old('eventEndTime', $event->eventEndTime->format('H:i')) }}" class="form-control">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label for="eventPrice" class="form-label">Price (RM)</label>
                            <input type="number" step="any" min="0" id="eventPrice" name="eventPrice" value="{{ old('eventPrice', $event->eventPrice) }}" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="eventCapacity" class="form-label">Capacity</label>
                            <input type="number" id="eventCapacity" min="1" name="eventCapacity" value="{{ old('eventCapacity', $event->eventCapacity) }}" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="eventStatus" class="form-label">Status</label>
                            <select id="eventStatus" name="eventStatus" class="form-select">
                                @foreach (['Pending', 'Confirmed', 'Rejected'] as $status)
                                    <option value="{{ $status }}" @selected($event->eventStatus === $status)>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="eh-form-actions">
                        <button type="submit" class="btn btn-primary">Update Event</button>
                        <a href="{{ url('events') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
