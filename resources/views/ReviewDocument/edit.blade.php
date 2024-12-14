@extends('Layouts.userlayout')

@section('title')
    <title>Review Document</title>
@endsection

@section('header')
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Review Document</h1>
@endsection

@section('content')

<div class="card mt-5">
    <h1 class="card-header font-bold tracking-tight text-gray-900">
        Review Document
    </h1>
    <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-danger" href="{{ route('Review.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('Review.update', $Review->reviewID) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="inputcontent" class="form-label"><strong>Request Type:</strong></label><br>
                <select name="requestTypeID">
                    @foreach($RequestType as $row)
                        @if($row->requestTypeID == $Request->requestTypeID)
                            <option value="{{ $row->requestTypeID }}" selected>{{ $row->requestTypeDesc }}</option>
                        @else
                            <option value="{{ $row->requestTypeID }}">{{ $row->requestTypeDesc }}</option>
                        @endif
                    @endforeach
                </select>
                @error('content')
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputcontent" class="form-label"><strong>Document Type:</strong></label><br>
                <select name="docTypeID">
                    @foreach($DocType as $row)
                        @if($row->docTypeID == $Request->docTypeID)
                        <option value="{{ $row->docTypeID }}" selected>{{ $row->docTypeDesc }}</option>
                        @else
                            <option value="{{ $row->docTypeID }}">{{ $row->docTypeDesc }}</option>
                        @endif
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
                    value="{{ $Request->docRefCode }}"
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
                    required>
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputcontent" class="form-label"><strong>Action</strong></label><br>
                <select name="reviewStatus">
                    @if($Review->reviewStatus == 1)
                        <option value=1 selected>Recommend Approval</option>
                        <option value=0>Disapproved</option>
                    @else
                        <option value=1>Recommend Approval</option>
                        <option value=0 selected>Disapproved</option>
                    @endif
                </select>
                @error('content')
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Action Reasons/Details:</strong></label>
                <textarea 
                    name="reviewComment" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="reviewComment"
                    rows="4" cols="50"
                    required>{{ $Review->reviewComment }}</textarea>
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <input 
                    type="hidden"
                    name="status" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="status"
                    value="2" 
                    required>
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
                </div>
            <button type="submit" class="btn btn-success "><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </form>
    </div>
</div>
@endsection