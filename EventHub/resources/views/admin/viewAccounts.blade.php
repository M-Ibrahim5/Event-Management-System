@extends('layouts.adminmain')

@section('title', 'Accounts · EventHub Admin')

@section('container')
    <div class="eh-pagehead">
        <div>
            <h1>Accounts</h1>
            <p>People who can buy tickets and organize events.</p>
        </div>
        <a href='/createuser' class="btn btn-primary">Add Account</a>
    </div>

    <form class="eh-toolbar" role="search" method="GET" action="{{ url('/accounts') }}">
        <input class="form-control" type="search" name="search" value="{{ request('search') }}" placeholder="Search accounts" aria-label="Search accounts">
        <button class="btn btn-dark" type="submit">Search</button>
        <a class="btn btn-outline-secondary" href="{{ url('/accounts') }}">Clear</a>
    </form>

    @if (session('status'))
        <div class="alert alert-success" role="status">{{ session('status') }}</div>
    @endif

    <div class="allAccounts eh-panel">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col"><span class="visually-hidden">Actions</span></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $account)
                    <tr>
                        <td>{{ $account->f_name }} {{ $account->l_name }}</td>
                        <td>{{ $account->email }}</td>
                        <td class="text-end">
                            <form action="{{ url('deleteuser/' . $account->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center text-muted py-5">No accounts found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
