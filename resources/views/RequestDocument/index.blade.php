@extends('Layouts.userlayout')

@section('title')
    <title>Request Document</title>
@endsection

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Request Document</h2>
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success" href="{{ route('RequestDocument.create') }}"><i class="fa fa-plus"></i> Create New Request Document</a>
        </div>

        <table class="table table-bordered table-striped mt-4 background-color=#007700">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Document Name</th>
                    <th>Document Type</th>
                    <th>Requested By</th>
                    <th>Status</th>
                    <th width="250px">Action</th>
                </tr>
                @foreach ($RequestDocuments as $RequestDocument)
                <tr>
                    <td>{{ $RequestDocument->requestID}}</td>
                    <td>{{ $RequestDocument->docTitle}}</td>
                    <td>{{ $RequestDocument->docTypeDesc}}</td>
                    <td>{{ $RequestDocument->userFirstname}} {{ $RequestDocument->userLastname}}</td>
                    @if($RequestDocument->requestStatus == 1)
                        <td>For Review</td>
                    @else
                        <td>Inactive</td>
                    @endif
                    <td>
                        <form action="{{ route('RequestDocument.destroy', $RequestDocument->requestID) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-success" href="{{ route('RequestDocument.edit', $RequestDocument->requestID) }}"><i class="fas fa-edit"></i> Edit</a>
                            <button class="btn btn-danger" type="SUBMIT"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </thead>
            </div>
            <div>
                {{ $RequestDocuments->links() }}
            </div>
        </table>

    </div>
</div>  

@endsection