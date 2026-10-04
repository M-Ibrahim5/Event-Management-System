@extends('layouts.auth')

@section('title', 'Create account · EventHub')

@section('container')
    <h1 class="eh-auth__title">Create an account</h1>
    <p class="eh-auth__lead">Buy tickets, save favourites and host your own events.</p>

    <form action="/signupUser" method="post">
        @csrf
        <div class="row g-3 mb-3">
            <div class="col-sm-6">
                <label for="fname" class="form-label">First name</label>
                <input type="text" class="form-control" id="fname" name="fname" autocomplete="given-name" required autofocus>
            </div>
            <div class="col-sm-6">
                <label for="lname" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lname" name="lname" autocomplete="family-name" required>
            </div>
        </div>
        <div class="eh-auth__field">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" autocomplete="email" required>
        </div>
        <div class="eh-auth__field">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" autocomplete="new-password" required>
        </div>
        <button type="submit" class="btn btn-dark eh-auth__submit">Create</button>
    </form>

    <p class="eh-auth__switch">Already have an account? <a href="/login">Log in</a></p>
@endsection
