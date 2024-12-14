@extends('Layouts.userlayout')

@section('title')
    <title>Register Document</title>
@endsection

@section('header')
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Register Document</h1>
@endsection

@section('content')

<div class="card mt-5">
    <h1 class="card-header font-bold tracking-tight text-gray-900">
        Register Document
    </h1>
    <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-danger" href="{{ route('Register.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('Register.store', $Request->requestID) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Request Type:</strong></label>
                    @foreach($RequestType as $row)
                        @if($row->requestTypeID == $Request->requestTypeID)
                            <input 
                                type="text" 
                                name="requestType" 
                                class="form-control @error('name') is-invalid @enderror" 
                                id="requestType"    
                                value="{{ $row->requestTypeDesc }}"
                                readonly
                                required>
                        @endif
                    @endforeach
                    @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputcontent" class="form-label"><strong>Document Type:</strong></label><br>
                    @foreach($DocType as $row)
                        @if($row->docTypeID == $Request->docTypeID)
                            <input 
                                type="text" 
                                name="docType" 
                                class="form-control @error('name') is-invalid @enderror" 
                                id="docType"    
                                value="{{ $row->docTypeDesc }}"
                                readonly
                                required>
                        @endif
                    @endforeach
                    @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Document Reference Code:</strong></label>
                <input 
                    type="text" 
                    name="docRefCode" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="docRefCode" 
                    value="{{ $Request->docRefCode }}"
                    readonly
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
                    value="{{ $Request->currentRevNo }}"
                    readonly
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
                    value="{{ $Request->docTitle }}"
                    readonly
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
                    value="{{ $Request->requestReason }}"
                    readonly
                    required>
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Request File:</strong></label>
                <a class="btn btn-secondary" href="{{ route('RequestDocument.show', $Request->requestFile)}}"> {{ $Request->requestFile }}</a>
            </div>
            
            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Request Date:</strong></label>
                <input 
                    type="date" 
                    name="requestDate" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="requestDate" 
                    value="{{ $Request->requestDate }}"
                    readonly
                    required>
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Recommendation Reasons/Details:</strong></label>
                <textarea 
                    name="reviewComment" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="reviewComment"
                    rows="4" cols="50"
                    readonly
                    required>{{ $Review->reviewComment }}</textarea>
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Approve Date:</strong></label>
                <input 
                    type="date" 
                    name="approveDate" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="approveDate" 
                    value="{{ $Approve->approveDate }}"
                    readonly
                    required>
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Approve Reasons/Details:</strong></label>
                <textarea 
                    name="approveComment" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="approveComment"
                    rows="4" cols="50"
                    readonly
                    required>{{ $Approve->approveComment }}</textarea>
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Effectivity Date:</strong></label>
                <input 
                    type="date" 
                    name="effectivityDate" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="effectivityDate" 
                    required>
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Register File:</strong></label>
                <input 
                    type="file" 
                    name="docFile" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="docFile"
                    accept=".pdf"
                    required>
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <input 
                type="text" 
                name="requestID" 
                class="form-control @error('name') is-invalid @enderror" 
                id="requestID" 
                value="{{ $Request->requestID }}"
                hidden
                required>
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-success "><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </form>
    </div>
</div>
@endsection