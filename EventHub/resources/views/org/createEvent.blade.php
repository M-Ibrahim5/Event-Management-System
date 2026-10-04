<!--Extending template layout-->
@extends('layouts.createmain')

@section('title', 'Create event · EventHub')

@section('container')
    <div class="eh-form-card">
        <a href="{{ route('organization.showEvent') }}" class="eh-back">&larr; Back to your events</a>

        <div class="eh-pagehead">
            <div>
                <h1>Create event</h1>
                <p>An admin reviews every new event before it goes live.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="/createEvent" method="post" enctype="multipart/form-data">
                    @csrf

                    @include('partials.event-fields', ['imageRequired' => true])

                    <!-- Hidden Input Example -->
                    <input type="hidden" name="sponsorStatus" value="Pending">
                    <input type="hidden" name="eventStatus" value="Pending">
                    <input type="hidden" name="email" value="{{ $userEmail }}">

                    <div class="eh-form-actions">
                        <button type="submit" id="createEventButton" class="btn btn-primary">Create</button>
                        <a href="{{ route('organization.showEvent') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
