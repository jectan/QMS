@extends('Layouts.layout')

@section('title')
    <title>Document Type</title>
@endsection

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Document Type</h2>
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success" href="{{ route('DocType.create') }}"><i class="fa fa-plus"></i> Create New Document Type</a>
        </div>

        <table class="table table-bordered table-striped mt-4 background-color=#007700">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Document Type</th>
                    <th>Status</th>
                    <th width="250px">Action</th>
                </tr>
                @foreach ($DocTypes as $DocType)
                <tr>
                    <td>{{ $DocType->docTypeID}}</td>
                    <td>{{ $DocType->docTypeDesc}}</td>
                    @if($DocType->status == 1)
                        <td>Active</td>
                    @else
                        <td>Inactive</td>
                    @endif
                    <td>
                        <form action="{{ route('DocType.destroy', $DocType->docTypeID) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-success" href="{{ route('DocType.edit', $DocType->docTypeID) }}"><i class="fas fa-edit"></i> Edit</a>
                            <button class="btn btn-danger" type="SUBMIT"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </thead>
            </div>
            <tbody>
            </tbody>
                <div>    
                    {{ $DocTypes->links() }}
                </div>
        </table>

    </div>
</div>  

@endsection