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
                        <h4>Add Sponsorship
                            <a href="{{ url('sponsors') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
    
                        <form action="/storesponsor" method="POST">
                            @csrf
    
                            <div class="form-group mb-3">
                                <label for="">Sponsor Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Sponsor Description</label>
                                <input type="text" name="description"  class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Amount (RM)</label>
                                <input type="text" name="amount" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Add Sponsor</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection