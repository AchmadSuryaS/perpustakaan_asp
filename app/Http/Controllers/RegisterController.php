<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view ('register', [
            'title' => 'Register    '
        ]);
    }

    public function store(request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'username' => 'required|max:255|min:3|unique:users',
            'password' => 'required|max:255|min:3',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $validated['role_id'] = 3;

        User::create($validated);

        return redirect('/login')->with('success', 'Register successfull! Please Login');
    }
}
