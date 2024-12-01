@extends('Layouts.layout')

@section('title')
    <title>Division</title>
@endsection

@section('content')
<div class="card mt-5">
    <h2 class="card-header">Edit Division</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('Division.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('Division.update', $Division->divID) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Division Name:</strong></label>
                <input 
                    type="text" 
                    name="divName" 
                    class="form-control @error('name') is-invalid @enderror" 
                    value="{{ $Division->divName }}">
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputcontent" class="form-label"><strong>Status</strong></label>
                <select name="status">
                @if($Division->status ==1) 
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