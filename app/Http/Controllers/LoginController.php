<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Fortify;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login/index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                'username' => 'required',
                'password' => 'required|max:255'
            ],
            [
                'username.required' => 'Username harus di isi',
                'password.required' => 'Password harus di isi',
                'password.max' => 'Password mencapai batas maximum',
            ]
        );

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        } else {
            return back()->with('loginError', 'Login failed!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(users $users)
    {
        //
    }
}
