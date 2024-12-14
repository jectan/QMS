@extends('Layouts.userlayout')

@section('title')
    <title>Request Document</title>
@endsection

@section('header')
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Add Request Document</h1>
@endsection

@section('content')

<div class="card mt-5">
    <h1 class="card-header font-bold tracking-tight text-gray-900">
        Add Request Document
    </h1>
    <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-danger" href="{{ route('RequestDocument.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('RequestDocument.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="inputcontent" class="form-label"><strong>Request Type:</strong></label><br>
                <select name="requestTypeID">
                    @foreach($RequestType as $row)
                        <option value="{{ $row->requestTypeID }}">{{ $row->requestTypeDesc }}</option>
                    @endforeach
                </select>
                @error('content')
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputcontent" class="form-label"><strong>Document Type:</strong></label><br>
                <select name="docTypeID">
                    @foreach($DocType as $row)
                        <option value="{{ $row->docTypeID }}">{{ $row->docTypeDesc }}</option>
                    @endforeach
                </select>
                @error('content')
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Document Reference Code:</strong></label>
                <input 
                    type="text" 
                    name="docRefCode" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="docRefCode" 
                    placeholder="N/A"
                    required>
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Current Revision Number:</strong></label>
                <input 
                    type="number" 
                    name="currentRevNo" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="currentRevNo  " 
                    placeholder="Current Revision Number"
                    required>
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Document Title:</strong></label>
                <input 
                    type="text" 
                    name="docTitle" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="docTitle" 
                    placeholder="e.g. Leave Application Form"
                    required>
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Request Reason:</strong></label>
                <input 
                    type="text" 
                    name="requestReason" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="requestReason" 
                    placeholder="e.g. To register a new form"
                    required>
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Request File:</strong></label>
                <input 
                    type="file" 
                    name="requestFile" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="requestFile"
                    accept=".pdf"
                    required>
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Request Date:</strong></label>
                <input 
                    type="date" 
                    name="requestDate" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="requestDate" 
                    required>
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <input 
                    type="hidden"
                    name="requestStatus" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="requestStatus"
                    value="1" 
                    required>
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <input 
                    type="hidden"
                    name="userID" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="userID"
                    value="1" 
                    required>
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </form>

    </div>
</div>
@endsection