@extends('Layouts.layout')

@section('title')
    <title>User</title>
@endsection

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Users</h2>
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a class="btn btn-success" href="{{ route('User.create') }}"><i class="fa fa-plus"></i> Create New User</a>
</div>

<table class="table table-bordered table-striped mt-4 background-color=#007700">
    <thead>
        <tr>
            <th width="80px">No</th>
            <th>User Name</th>
            <th>Employee Name</th>
            <th>Unit</th>
            <th>Status</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($Users as $User)
        <tr>
            <td>{{ $User->userID}}</td>
            <td>{{ $User->username}}</td>
            <td>{{ $User->userLastname }}, {{ $User->userFirstname}}</td>
            <td>{{ $User->unitName}}</td>
            @if($User->status == 1)
                <td>Active</td>
            @else
                <td>Inactive</td>
            @endif
            <td>
                <form action="{{ route('User.destroy', $User->userID) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-success" href="{{ route('User.edit', $User->userID) }}"><i class="fas fa-edit"></i> Edit</a>
                    <button class="btn btn-danger" type="SUBMIT"><i class="fas fa-trash"></i> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
            </thead>
            </div>
            <div>    
                {{ $Users->links() }}
            </div>
        </table>

    </div>
</div>  

@endsection