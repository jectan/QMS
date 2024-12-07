<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Unit;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $Users = Unit::join('User', 'user.unitID', '=', 'Unit.unitID')
              		->get(['User.userID', 'User.username', 'User.userLastname', 'User.userFirstname', 'Unit.unitName', 'User.status']);
        return view('User.index', compact('Users'));
    }
    
    public function create()
    {
        $Unit = Unit::all();
        return view('User.create', compact('Unit'));
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('User.index')
          ->with('success', 'User Created Successfully.');
    }
    
    public function edit($id)
    {
        $User = User::find($id);
        $Unit = Unit::all();
        return view('User.edit', compact('User'), compact('Unit'));
    }

    public function update(Request $request, $id)
    {
        $User = User::find($id);
        $User->update($request->all());
        return redirect()->route('User.index')
            ->with('success', "User Updated Successfully!");
    }
    
    public function destroy($id)
    {
        $User = User::find($id);
        $User->delete();
        return redirect()->route('User.index')
            ->with('success', "User Deleted Successfully!");
    }
}
