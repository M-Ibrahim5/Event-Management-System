<!--Extending template layout-->
@extends('layouts.createmain')

@section('title', 'Edit event · EventHub')

@section('container')
    <div class="eh-form-card">
        <a href="{{ route('organization.showEvent') }}" class="eh-back">&larr; Back to your events</a>

        <div class="eh-pagehead">
            <div>
                <h1>Edit event</h1>
                <p>{{ $data->eventName }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="/updateEvent/{{ $data->id }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @include('partials.event-fields', ['event' => $data])

                    <!-- Hidden Input Example -->
                    <input type="hidden" name="SponsorStatus" value="Pending">
                    <input type="hidden" name="eventStatus" value="Pending">
                    <input type="hidden" name="imagePath" value={{ $data->pathImage }}>

                    <div class="eh-form-actions">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('organization.showEvent') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
