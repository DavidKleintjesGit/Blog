<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('user.login');
    }

    public function store()
    {
        $validatedRequest = request()->validate([
           'username' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($validatedRequest)) {
            throw ValidationException::withMessages([
                'username' => 'credentials did not exist or match'
            ]);
        }

        session()->regenerate();

        return redirect('/')->with('succes', 'You are logged in!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('succes', 'Goodbye!');
    }
}
