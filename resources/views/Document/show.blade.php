@extends('Layouts.userlayout')

@section('title')
    <title>View Document</title>
@endsection

@section('header')
    <h1 class="text-3xl font-bold tracking-tight text-gray-900"></h1>
@endsection

@section('content')

<div class="card mt-5">
    <h1 class="card-header font-bold tracking-tight text-gray-900">
        View Document
    </h1>
    <div class="card-body">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-danger" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
        <div class="mb-3">
            <iframe height="800" width="100%" src="/RegisteredDocuments/{{$DocumentFile}}"></iframe>
        </div>
</div>
@endsection