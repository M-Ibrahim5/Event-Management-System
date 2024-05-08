@extends('layouts.adminmain')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
    
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
    
                <div class="card">
                    <div class="card-header">
                        <h4>Add Event
                            <a href="{{ url('accounts') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
    
                        <form action="/storeuser" method="POST">
                            @csrf
    
                            <div class="form-group mb-3">
                                <label for="">User First Name</label>
                                <input type="text" name="f_name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">User Last Name</label>
                                <input type="text" name="l_name"  class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                            {{-- <div>      Not implemented yet/xtau nk implement ke x
                                <label for="">Organizer?</label>
                                <select name="confirmation" class="form-select" aria-label="Default select example">
                                    <option value="True" {{ $user->isOrganiser === 'True' ? 'selected' : '' }}>True</option>
                                    <option value="False" {{ $user->isOrganiser === 'False' ? 'selected' : '' }}>False</option>
                                </select>
                            </div> --}}
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Add User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection