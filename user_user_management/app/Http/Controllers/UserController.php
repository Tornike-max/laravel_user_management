<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register()
    {
        return view('pages/auth/register');
    }

    public function registerUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);

        if (User::create($validatedData)) {
            return redirect('/users/login');
        } else {
            return back();
        }
    }

    public function login()
    {
        return view('pages/auth/login');
    }

    public function loginUser(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (empty($validatedData)) {
            return redirect('/users/register')->withErrors('errors');
        }
        Auth::attempt($validatedData);
        return redirect('/students');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/users/login');
    }
}
