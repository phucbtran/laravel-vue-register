<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $username = trim($request->username);
        $password = $request->password; 

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect()->route('company.home.index');
        } else {
            return redirect()->route('auth.login.login')->with('msg', 'Username or Password not correct');
        }
    }

}
