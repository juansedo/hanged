<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    protected $salt = '*w_52$0%Hk';

    public function login(Request $request)
    {
        $this->validate($request, [
            'user' => 'required',
            'pass' => 'required',
        ]);
        if (request('pass') == "1") {//Auth::attempt(['email' => $email, 'password' => $password])) {
            // Success
            return redirect()->route('game', ['user' => request('user')]);
        } else {
            return redirect('/')->withErrors(['no-auth' => 'User is not registered']);
        }

    }
}
