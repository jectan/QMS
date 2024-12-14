@extends('Layouts.layout')

@section('title')
    <title>Division</title>
@endsection

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Add New Division</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-danger" href="{{ route('Division.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('Division.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Division Name:</strong></label>
                <input 
                    type="text" 
                    name="divName" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="inputName" 
                    placeholder="Name">
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputcontent" class="form-label"><strong>Status</strong></label>
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