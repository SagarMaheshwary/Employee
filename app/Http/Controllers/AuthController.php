<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     *  Show login View
     */
    public function index(){
        return view('auth.index');
    }

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|min:6',
            'password' => 'required|min:7',
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->has('remember'))) {
            // Authentication passed...
            return redirect()->route('dashboard');
        }
    }

    public function logout()
    {
        //logout the user
        Auth::logout();
        
        return redirect('/')->with('info','Successfully logged out!');
    }

    /**
     *  show details of authenticated user
     */
    public function show(){
        return view('auth.show');
    }
}
