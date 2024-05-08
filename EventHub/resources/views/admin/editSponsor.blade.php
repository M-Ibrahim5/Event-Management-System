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
                        <h4>Edit Sponsor Details
                            <a href="{{ url('sponsors') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
    
                        <form action="{{ url('updatesponsor/'.$sponsor->id) }}" method="POST">
                            @csrf
                            @method('PUT')
    
                            <div class="form-group mb-3">
                                <label for="">Sponsor Name</label>
                                <input type="text" name="name" value="{{ $sponsor->sponsorName }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Sponsor Description</label>
                                <input type="text" name="description" value="{{ $sponsor->sponsorDescription }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Amount</label>
                                <input type="text" name="amount" value="{{ $sponsor->sponsorAmount }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update Sponsor</button>
                            </div>
    
                        </form>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection