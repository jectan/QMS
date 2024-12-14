@extends('Layouts.userlayout')

@section('title')
    <title>Register Document</title>
@endsection

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Register Document</h2>
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
                    <th>Request Type</th>
                    <th>Document Type</th>
                    <th>Requested By</th>
                    <th>Status</th>
                    <th width="250px">Action</th>
                </tr>
                @foreach ($RequestDocuments as $RequestDocument)
                <tr>
                    <td>{{ $RequestDocument->requestID}}</td>
                    <td>{{ $RequestDocument->docTitle}}</td>
                    <td>{{ $RequestDocument->requestTypeDesc}}</td>
                    <td>{{ $RequestDocument->docTypeDesc}}</td>
                    <td>{{ $RequestDocument->userFirstname}} {{ $RequestDocument->userLastname}}</td>
                    @if($RequestDocument->requestStatus == 3)
                        <td>For Registration</td>
                    @else
                        <td>Registered</td>
                    @endif
                    <td>
                        <form action="{{ route('Register.destroy', $RequestDocument->requestID) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            @if($RequestDocument->requestStatus == 4)
                                <a class="btn btn-success" href="{{ route('Register.edit', $RequestDocument->requestID) }}"><i class="fas fa-edit"></i> Edit</a>
                            @else
                                <a class="btn btn-success" href="{{ route('Register.create', $RequestDocument->requestID) }}"><i class="fas fa-edit"></i> Register</a>
                            @endif
                            
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