@extends('layouts.adminmain')

@section('container')
<div class="card">
    <div class="card-header">
        <h2>Sponsors
            <a href='/createsponsor' class="btn btn-success float-end">Add Sponsor</a>
        </h2>  
        <form class="d-flex" role="search" method="GET" action="{{ url('/sponsors') }}">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
            <button class="btn btn-outline-danger" type="a" href="{{ url('/sponsors') }}" style="margin-left: 10px">Clear</button>
        </form>
    </div>            
</div>   
    <div class = allSponsors> 
        @if (session('status'))
            <h6 class="alert alert-danger">{{ session('status') }}</h6>
        @endif

        <table class="table table-bordered border-black">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Amount (RM)</th>
                    <th scope='col'></th>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($data as $data)
                    <tr>
                        <td><a href="{{ url('editsponsor/'.$data->id) }}">{{ $data->sponsorName }}</a></td>
                        <td>{{ $data->sponsorDescription }}</td>
                        <td>{{ $data->sponsorAmount }}</td>
                        <td>
                            <form action="{{ url('deletesponsor/'.$data->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            
                            <center>
                                <button type='submit' class="btn btn-danger btn-sm" data-toggle="tooltip">
                                    Delete
                                </button>
                            </center>
                            
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
@endsection