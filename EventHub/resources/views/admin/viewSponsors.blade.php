@extends('layouts.adminmain')

@section('title', 'Sponsorships · EventHub Admin')

@section('container')
    <div class="eh-pagehead">
        <div>
            <h1>Sponsorships</h1>
            <p>Sponsors that organizers can apply to.</p>
        </div>
        <a href='/createsponsor' class="btn btn-primary">Add Sponsor</a>
    </div>

    <form class="eh-toolbar" role="search" method="GET" action="{{ url('/sponsors') }}">
        <input class="form-control" type="search" name="search" value="{{ request('search') }}" placeholder="Search sponsors" aria-label="Search sponsors">
        <button class="btn btn-dark" type="submit">Search</button>
        <a class="btn btn-outline-secondary" href="{{ url('/sponsors') }}">Clear</a>
    </form>

    @if (session('status'))
        <div class="alert alert-success" role="status">{{ session('status') }}</div>
    @endif

    <div class="allSponsors eh-panel">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col" class="text-end">Amount (RM)</th>
                    <th scope="col"><span class="visually-hidden">Actions</span></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $sponsor)
                    <tr>
                        <td><a href="{{ url('editsponsor/' . $sponsor->id) }}">{{ $sponsor->sponsorName }}</a></td>
                        <td>{{ $sponsor->sponsorDescription }}</td>
                        <td class="text-end">{{ $sponsor->sponsorAmount }}</td>
                        <td class="text-end">
                            <form action="{{ url('deletesponsor/' . $sponsor->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-muted py-5">No sponsors found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
