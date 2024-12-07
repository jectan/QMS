<?php

namespace App\Http\Controllers;

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

    public function store(): RedirectResponse
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

        request()->session()->regenerate();

        return redirect()->route('Division.index');
    }
}
