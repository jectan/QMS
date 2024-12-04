@extends('Layouts.layout')

@section('title')
    <title>User</title>
@endsection

@section('header')
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Add User</h1>
@endsection

@section('content')

<div class="card mt-5">
    <h1 class="card-header font-bold tracking-tight text-gray-900"">
        Add User
    </h1>
    <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-danger" href="{{ route('User.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('User.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>First Name:</strong></label>
                <input 
                    type="text" 
                    name="userFirstname" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="inputName" 
                    placeholder="First Name">
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
                    id="inputName" 
                    placeholder="Last Name">
                @error('userLastname')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputcontent" class="form-label"><strong>Unit:</strong></label><br>
                <select name="unitID">
                    @foreach($Unit as $row)
                        <option value="{{ $row->unitID }}">{{ $row->unitName }}</option>
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
                    id="inputName" 
                    placeholder="juan.delacruz@dict.gov.ph">
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
                    id="inputName" 
                    placeholder="*******">
                @error('password')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputcontent" class="form-label"><strong>Status:</strong></label><br>
                <select name="status">
                    <option value=1>Active</option>
                    <option value=0>Inactive</option>
                </select>
                @error('content')
                @enderror
            </div>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </form>

    </div>
</div>
@endsection