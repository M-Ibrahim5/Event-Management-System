@extends('layouts.adminmain')

@section('title', 'Add event · EventHub Admin')

@section('container')
    <div class="eh-form-card">
        <a href="{{ url('events') }}" class="eh-back">&larr; Back to events</a>

        <div class="eh-pagehead">
            <div>
                <h1>Add Event</h1>
                <p>Events added here are created as pending until you confirm them.</p>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="status">{{ session('status') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="/storeevent" method="post" enctype="multipart/form-data">
                    @csrf

                    @include('partials.event-fields', ['imageRequired' => true])

                    <!-- Hidden Input Example -->
                    <input type="hidden" name="sponsorStatus" value="Pending">
                    <input type="hidden" name="eventStatus" value="Pending">
                    <input type="hidden" name="email" value="EventHub@gmail.com">

                    <div class="eh-form-actions">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ url('events') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
