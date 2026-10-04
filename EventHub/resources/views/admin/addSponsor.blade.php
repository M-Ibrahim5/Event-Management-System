<!--Extending template layout-->
@extends('layouts.adminmain')

@section('title', 'Add sponsor · EventHub Admin')

@section('container')
    <div class="eh-form-card">
        <a href="{{ url('sponsors') }}" class="eh-back">&larr; Back to sponsorships</a>

        <div class="eh-pagehead">
            <div>
                <h1>Add Sponsorship</h1>
                <p>Organizers can apply to any sponsor listed here.</p>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="status">{{ session('status') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="/storesponsor" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Sponsor name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" id="description" name="description" class="form-control" required>
                        <p class="eh-help">What kind of events this sponsor supports.</p>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Maximum amount (RM)</label>
                        <input type="text" inputmode="decimal" id="amount" name="amount" class="form-control" required>
                    </div>

                    <div class="eh-form-actions">
                        <button type="submit" class="btn btn-primary">Add Sponsor</button>
                        <a href="{{ url('sponsors') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
