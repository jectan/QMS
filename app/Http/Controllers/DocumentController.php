<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocType;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Documents = Document::all();
        return view('Document.index', ['Documents'=>$Documents]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $DocType = DocType::all();
        return view('Document.create', compact('DocType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Document::create($request->all());
        return redirect()->route('Document.index')
          ->with('success', 'Document Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        dd('Edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        dd('Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        dd('Delete');
    }
}
