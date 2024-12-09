@extends('Layouts.layout')

@section('title')
    <title>Unit</title>
@endsection

@section('header')
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Edit Unit</h1>
@endsection

@section('content')

<div class="card mt-5">
    <h2 class="card-header">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('Unit.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </h2>
    <div class="card-body">

        <form action="{{ route('Unit.update', $Unit->unitID) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Unit Name:</strong></label>
                <input 
                    type="text" 
                    name="unitName" 
                    class="form-control @error('name') is-invalid @enderror" 
                    value="{{ $Unit->unitName }}"
                    required>
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputcontent" class="form-label"><strong>Division</strong></label>
                <select name="divID">
                    @foreach($Division as $row)
                        @if($row->divID == $Unit->divID)
                        <option value="{{ $row->divID }}" selected>{{ $row->divName }}</option>
                    @else
                        <option value="{{ $row->divID }}">{{ $row->divName }}</option>
                        @endif
                    @endforeach
                </select>
                @error('content')
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputcontent" class="form-label"><strong>Status</strong></label>
                <select name="status">
                @if($Unit->status ==1) 
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