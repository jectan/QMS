@extends('Layouts.layout')

@section('title')
    <title>Division</title>
@endsection

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Division</h2>
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success" href="{{ route('Division.create') }}"><i class="fa fa-plus"></i> Create New Division</a>
        </div>

        <table class="table table-bordered table-striped mt-4 background-color=#007700">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Division Name</th>
                    <th>Status</th>
                    <th width="250px">Action</th>
                </tr>
                @foreach ($Divisions as $Division)
                <tr>
                    <td>{{ $Division->divID}}</td>
                    <td>{{ $Division->divName}}</td>
                    @if($Division->status == 1)
                        <td>Active</td>
                    @else
                        <td>Inactive</td>
                    @endif
                    <td>
                        <form action="{{ route('Division.destroy', $Division->divID) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-success" href="{{ route('Division.edit', $Division->divID) }}"><i class="fas fa-edit"></i> Edit</a>
                            <button class="btn btn-danger" type="SUBMIT"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </thead>
            </div>
            <tbody>
            </tbody>
        </table>

    </div>
</div>  

@endsection