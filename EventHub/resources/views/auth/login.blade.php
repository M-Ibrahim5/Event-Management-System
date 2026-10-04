@extends('layouts.auth')

@section('title', 'Log in · EventHub')

@section('container')
    <h1 class="eh-auth__title">Log in</h1>
    <p class="eh-auth__lead">Welcome back. Pick up where you left off.</p>

    @if (session('error'))
        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
    @endif
    @if (session('status'))
        <div class="alert alert-success" role="status">{{ session('status') }}</div>
    @endif

    <form action="/loginProcess" method="post">
        @csrf
        <div class="eh-auth__field">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                autocomplete="email" required autofocus>
        </div>
        <div class="eh-auth__field">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password"
                autocomplete="current-password" required>
        </div>
        <button type="submit" class="btn btn-dark eh-auth__submit">Login</button>
    </form>

    <p class="eh-auth__switch">New to EventHub? <a href="/signup">Create an account</a></p>
@endsection
