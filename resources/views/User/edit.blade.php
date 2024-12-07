@extends('Layouts.layout')

@section('title')
    <title>User</title>
@endsection

@section('header')
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Edit User</h1>
@endsection

@section('content')

<div class="card mt-5">
    <h2 class="card-header">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('User.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </h2>
    <div class="card-body">

        <form action="{{ route('User.update', $User->userID) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>First Name:</strong></label>
                <input 
                    type="text" 
                    name="userFirstname" 
                    class="form-control @error('name') is-invalid @enderror" 
                    value="{{ $User->userFirstname }}">
                @error('userFirstname')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Last Name:</strong></label>
                <input 
                    type="text" 
                    name="userLastname" 
                    class="form-control @error('name') is-invalid @enderror" 
                    value="{{ $User->userLastname }}">
                @error('userLastname')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputcontent" class="form-label"><strong>Unit:</strong></label><br>
                <select name="unitID">
                    @foreach($Unit as $row)
                        @if($row->unitID == $User->unitID)
                        <option value="{{ $row->unitID }}" selected>{{ $row->unitName }}</option>
                    @else
                        <option value="{{ $row->unitID }}">{{ $row->unitName }}</option>
                        @endif
                    @endforeach
                </select>
                @error('content')
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Email Address:</strong></label>
                <input 
                    type="text" 
                    name="username" 
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ $User->username }}">
                @error('username')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Set Password:</strong></label>
                <input 
                    wire:model="password"
                    type="password" 
                    name="password" 
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ $User->password }}">
                @error('password')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputcontent" class="form-label"><strong>Status</strong></label>
                <select name="status">
                @if($User->status ==1) 
                    <option value=1 selected>Active</option>
                    <option value=0>Inactive</option>
                @else
                    <option value=1>Active</option>
                    <option value=0 selected>Inactive</option>
                @endif
                </select>
                @error('content')
                @enderror
            </div>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </form>

    </div>
</div>
@endsection