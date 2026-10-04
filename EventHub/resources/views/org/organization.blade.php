<!--Extending template layout-->
@extends('layouts.orgmain')

@section('title', 'Organizer home · EventHub')

@section('container')
    <section class="eh-banner">
        <div class="eh-banner__text">
            <h1>Host your own event</h1>
            <p>Submit an event, pick a sponsor and sell tickets. An admin reviews it before it goes live.</p>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('organization.createEvent') }}" class="btn btn-primary">Create event</a>
                <a href="{{ route('organization.showEvent') }}" class="btn btn-outline-secondary">Manage your events</a>
            </div>
        </div>
        <div class="eh-banner__img">
            <img src="{{ asset('img/eventoffuture.jpg') }}" alt="" onerror="this.remove()">
        </div>
    </section>
@endsection
