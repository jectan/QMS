<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Divisions = Division::all();
        return view('Division.index', ['Divisions'=>$Divisions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('Division.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Division::create($request->all());
        return redirect()->route('Division.index')
          ->with('success', 'Division Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Division = Division::find($id);
        return view('Division.edit', compact('Division'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $Division = Division::find($id);
        $Division->update($request->all());
        return redirect()->route('Division.index')
            ->with('success', "Division Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
        $Division = Division::find($id);
        $Division->delete();
        return redirect()->route('Division.index')
            ->with('success', "Division Deleted Successfully!");
    }
}
