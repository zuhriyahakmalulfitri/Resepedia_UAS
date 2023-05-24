<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {   
        ([
            'name' => 'required|max:255',
            'username' => 'required|max:255|without_spaces|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
    }

public function signuP(Request $request)
    {
        $user = New User([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->save();
        return redirect()->route('login')->with('success','Registrasi Berhasil, Silahkan Login'); 
    }
}