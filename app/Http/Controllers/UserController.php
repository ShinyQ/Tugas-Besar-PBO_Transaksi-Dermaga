<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function login_view()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user = User::login($request->username, $request->password);

        if (empty($user)) {
            return redirect()->back()->with('error', 'Username Atau Password Anda Salah');
        }

        $request->session()->put('id', $user->getId());
        $request->session()->put('username', $user->getName());
        $request->session()->put('role', $user->getIsAdmin());

        return redirect('/');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/user/login')->with('success', 'Sukses Melakukan Logout');
    }
}