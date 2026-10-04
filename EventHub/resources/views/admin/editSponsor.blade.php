@extends('layouts.adminmain')

@section('title', 'Edit sponsor · EventHub Admin')

@section('container')
    <div class="eh-form-card">
        <a href="{{ url('sponsors') }}" class="eh-back">&larr; Back to sponsorships</a>

        <div class="eh-pagehead">
            <div>
                <h1>Edit Sponsor Details</h1>
                <p>{{ $sponsor->sponsorName }}</p>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="status">{{ session('status') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ url('updatesponsor/' . $sponsor->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Sponsor name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $sponsor->sponsorName) }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" id="description" name="description" value="{{ old('description', $sponsor->sponsorDescription) }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Maximum amount (RM)</label>
                        <input type="text" inputmode="decimal" id="amount" name="amount" value="{{ old('amount', $sponsor->sponsorAmount) }}" class="form-control" required>
                    </div>

                    <div class="eh-form-actions">
                        <button type="submit" class="btn btn-primary">Update Sponsor</button>
                        <a href="{{ url('sponsors') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
