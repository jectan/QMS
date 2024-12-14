<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::guest())
        return redirect('/');
    
        $Roles = Role::query();
        return view('Role.index', ['Roles'=>$Divisions->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        /* return view('Role.create'); */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* Role::create($request->all());
        return redirect()->route('Role.index')
          ->with('success', 'Role Created Successfully.'); */
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $Role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        /* $Role = Role::find($id);
        return view('Role.edit', compact('Role')); */
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        /* $Role = Role::find($id);
        $Role->update($request->all());
        return redirect()->route('Role.index')
            ->with('success', "Role Updated Successfully!"); */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
        /* $Role = Role::find($id);
        $Role->delete();
        return redirect()->route('Role.index')
            ->with('success', "Role Deleted Successfully!"); */
    }
}
