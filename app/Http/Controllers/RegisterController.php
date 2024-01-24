<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\password;

class RegisterController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validatedRequest = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'unique:users,username'],
            'email' => ['required', 'email', 'max:255',  'unique:users,email'],
            'password' => ['required','min:7', 'max:255']
        ]);

        $user = User::create($validatedRequest);

        Auth::login($user);

       return redirect('posts')->with('succes', 'Your account has been created');
    }
}
