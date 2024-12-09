<?php

namespace App\Http\Controllers;

use App\Models\RequestType;
use Illuminate\Http\Request;

class RequestTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $RequestTypes = RequestType::query();
        return view('RequestType.index', ['RequestTypes'=>$Divisions->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RequestType $requestType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequestType $requestType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RequestType $requestType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequestType $requestType)
    {
        //
    }
}
