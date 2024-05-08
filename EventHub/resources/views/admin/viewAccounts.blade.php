@extends('layouts.adminmain')

@section('container')
<div class="card">
    <div class="card-header">
        <h2>Accounts
            <a href='/createuser' class="btn btn-success float-end">Add Account</a>
        </h2>  
        <form class="d-flex" role="search" method="GET" action="{{ url('/accounts') }}">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
            <button class="btn btn-outline-danger" type="a" href="{{ url('/accounts') }}" style="margin-left: 10px">Clear</button>
        </form>
    </div>
</div>
<div class = allAccounts>
    @if (session('status'))
        <h6 class="alert alert-danger">{{ session('status') }}</h6>
    @endif

    <table class="table table-bordered border-black">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                {{-- <th scope="col">Is Organizer?</th> --}}
                <th scope='col'></th>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($data as $data)
                <tr>
                    <td>{{ $data->f_name }} {{ $data->l_name }}</td>
                    <td>{{ $data->email }}</td>
                    {{-- <td>
                        @if($data->is_organizer)
                                True
                            @else
                                False
                            @endif 

                        Should have boolean variable kalau nak ikut idea madam
                    </td>                                            --}}
                    <td class="text-center">
                        <form action={{ url('deleteuser/'.$data->id) }} method="POST"> 
                        @csrf
                        @method('delete')
                        
                        <button type='submit' class="btn btn-danger btn-sm" data-toggle="tooltip">
                            Delete
                        </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection