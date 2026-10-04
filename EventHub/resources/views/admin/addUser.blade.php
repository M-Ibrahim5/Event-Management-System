@extends('layouts.adminmain')

@section('title', 'Add account · EventHub Admin')

@section('container')
    <div class="eh-form-card">
        <a href="{{ url('accounts') }}" class="eh-back">&larr; Back to accounts</a>

        <div class="eh-pagehead">
            <div>
                <h1>Add Account</h1>
                <p>Create a user who can buy tickets and organize events.</p>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="status">{{ session('status') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="/storeuser" method="POST">
                    @csrf

                    <div class="row g-3 mb-3">
                        <div class="col-sm-6">
                            <label for="f_name" class="form-label">First name</label>
                            <input type="text" id="f_name" name="f_name" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="l_name" class="form-label">Last name</label>
                            <input type="text" id="l_name" name="l_name" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" autocomplete="new-password" required>
                    </div>

                    <div class="eh-form-actions">
                        <button type="submit" class="btn btn-primary">Add User</button>
                        <a href="{{ url('accounts') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
