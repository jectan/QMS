<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if(Auth::guest())
        return redirect('/');
    
        $Users = Unit::join('User', 'user.unitID', '=', 'Unit.unitID')
        ->orderBy('User.userID', 'asc')->paginate(5);
        return view('User.index',  ['Users'=>$Users]);
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
