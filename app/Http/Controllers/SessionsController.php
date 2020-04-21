<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $user = request()->validate(['email' => 'required|email', 'password' => 'required']);
        if (Auth::attempt($user)) {
            return redirect()->home()->with('success', 'Welcome!');
        }
        return back()->withErrors(['message' => 'Failed to login. Please try again later.']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        auth()->logout();
        return redirect()->home()->with('success', 'You have been logged out.');
    }
}
