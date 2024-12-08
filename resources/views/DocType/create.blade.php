@extends('Layouts.layout')

@section('title')
    <title>Document Type</title>
@endsection

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Add New Document Type</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-danger" href="{{ route('DocType.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('DocType.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Document Type:</strong></label>
                <input 
                    type="text" 
                    name="docTypeDesc" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="docTypeDesc" 
                    placeholder="Doc Type">
                @error('docTypeDesc')
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