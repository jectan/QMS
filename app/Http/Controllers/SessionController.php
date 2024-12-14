<?php

namespace App\Http\Controllers;

use App\Models\RoleAssignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('Auth.login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' =>['required', 'email'],
            'password' =>['required']
        ]);

        if (! Auth::attempt($attributes))
        {
            throw ValidationException::withMessages([
                'username'=>'Sorry, those credentials do not match.'
            ]);
        }
        //$isAdmin=$this->checkAdmin(Auth::id());
        request()->session()->regenerate();
        
        return redirect()->route('RequestDocument.index');
    }

    public function destroy()
    {
        Auth::logout();

        //$request->session()->invalidate();

        //$request->session()->regenerateToken();

        return redirect('/');
    }

    public function checkAdmin($id)
    {
        $isAdmin = RoleAssignment::where([
            ['userID', '=', $id],
            ['roleID', '<>', '1'],])->firstOrFail();
        if($isAdmin == null)
            return(false);
        else
            return(true);
    }

    public function checkQMR($id):Boolean
    {
        $isAdmin = RoleAssignment::where([
            ['userID', '=', $id],
            ['roleID', '<>', '2'],])->firstOrFail();
        if($isAdmin == null)
            return(false);
        else
            return(true);
    }

    public function checkDMT($id):Boolean
    {
        $isAdmin = RoleAssignment::where([
            ['userID', '=', $id],
            ['roleID', '<>', '3'],])->firstOrFail();
        if($isAdmin == null)
            return(false);
        else
            return(true);
    }
}
