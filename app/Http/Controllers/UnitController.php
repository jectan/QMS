<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Division;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Units = Division::join('Unit', 'unit.divID', '=', 'Division.divID')
              		->get(['Unit.unitID', 'Unit.unitName', 'Division.divName', 'Unit.status']);
        return view('Unit.index', compact('Units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Division = Division::all();
        return view('Unit.create', compact('Division'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Unit::create($request->all());
        return redirect()->route('Unit.index')
          ->with('success', 'Unit Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Unit = Unit::find($id);
        $Division = Division::all();
        return view('Unit.edit', compact('Unit'), compact('Division'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $Unit = Unit::find($id);
        $Unit->update($request->all());
        return redirect()->route('Unit.index')
            ->with('success', "Unit Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Unit = Unit::find($id);
        $Unit->delete();
        return redirect()->route('Unit.index')
            ->with('success', "Unit Deleted Successfully!");
    }
}
