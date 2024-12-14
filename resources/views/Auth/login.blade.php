@extends('Layouts.loginlayout')

@section('title')
    <title>DICT R9 & BST QMS</title>
@endsection

@section('content')

<div class="card mt-5">
    <h2 class="card-header"><img class="size-100" src="DICT_Logo.png" alt="DICT_Logo" style="width:200px;height:100px;" place-items: center></h2>
    <div class="card-body">

        <form action="{{ route('Session.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label"><strong>Username:</strong></label>
                <input 
                    type="email" 
                    name="username" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="username" 
                    :value="old('username')" required>
                @error('username')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Password:</strong></label>
                <input 
                    type="password" 
                    name="password" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="password" required>
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success"><i class=""></i> Login</button>
        </form>

    </div>
</div>
@endsection