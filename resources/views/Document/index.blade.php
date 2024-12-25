@extends('Layouts.userlayout')

@section('title')
    <title>Registered Documents</title>
@endsection

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Registered Documents</h2>
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        </div>

        <table class="table table-bordered table-striped mt-4 background-color=#007700">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Document Name</th>
                    <th>Doc Ref Code</th>
                    <th>Document Type</th>
                    <th>Requested By</th>
                    <th>Status</th>
                    <th width="250px">Action</th>
                </tr>
                @foreach ($RegisteredDocs as $RegisteredDoc)
                <tr>
                    <td>{{ $RegisteredDoc->regDocID}}</td>
                    <td>{{ $RegisteredDoc->docTitle}}</td>
                    <td>{{ $RegisteredDoc->docRefCode}}</td>
                    <td>{{ $RegisteredDoc->docTypeDesc}}</td>
                    <td>{{ $RegisteredDoc->userFirstname}} {{ $RegisteredDoc->userLastname}}</td>
                    @if($RegisteredDoc->requestStatus == 3)
                        <td>For Registration</td>
                    @else
                        <td>Registered</td>
                    @endif
                    <td>
                        <a class="btn btn-success" href="{{ route('Registered.show', $RegisteredDoc->docFile) }}"><i class="fas fa-edit"></i> View</a>
                    </td>
                </tr>
                @endforeach
            </thead>
            </div>
            <div>
                {{ $RegisteredDocs->links() }}
            </div>
        </table>

    </div>
</div>  

@endsection