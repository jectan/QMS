@extends('Layouts.layout')

@section('title')
    <title>Unit</title>
@endsection

@section('header')
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Unit</h1>
@endsection

@section('content')

<div class="card mt-5">
    <h2 class="card-header">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success" href="{{ route('Unit.create') }}"><i class="fa fa-plus"></i> Create New Unit</a>
        </div>
    </h2>
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped mt-4 background-color=#007700">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Unit Name</th>
                    <th>Division</th>
                    <th>Status</th>
                    <th width="250px">Action</th>
                </tr>
                @foreach ($Units as $Unit)
                <tr>
                    <td>{{ $Unit->unitID}}</td>
                    <td>{{ $Unit->unitName}}</td>
                    <td>{{ $Unit->divName}}</td>
                    @if($Unit->status == 1)
                        <td>Active</td>
                    @else
                        <td>Inactive</td>
                    @endif
                    <td>
                        <form action="{{ route('Unit.destroy', $Unit->unitID) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-success" href="{{ route('Unit.edit', $Unit->unitID) }}"><i class="fas fa-edit"></i> Edit</a>
                            <button class="btn btn-danger" type="SUBMIT"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </thead>
            </div>
        </table>
            <div>    
                {{ $Units->links() }}
            </div>

    </div>
</div>  

@endsection