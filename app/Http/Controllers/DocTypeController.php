<?php

namespace App\Http\Controllers;

use App\Models\DocType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::guest())
        return redirect('/');

        $DocTypes = DocType::query();
        return view('DocType.index', ['DocTypes'=>$DocTypes->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('DocType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DocType::create($request->all());
        return redirect()->route('DocType.index')
          ->with('success', 'Document Type Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DocType $docType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $DocType = DocType::find($id);
        return view('DocType.edit', compact('DocType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $DocType = DocType::find($id);
        $DocType->update($request->all());
        return redirect()->route('DocType.index')
            ->with('success', "Docment Type Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
        $DocType = DocType::find($id);
        $DocType->delete();
        return redirect()->route('DocType.index')
            ->with('success', "Document Type Deleted Successfully!");
    }
}
