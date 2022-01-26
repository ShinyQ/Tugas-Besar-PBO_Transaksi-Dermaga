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
        $data = User::login($request->username, $request->password);

        if (empty($data)) {
            return redirect()->back()->with('error', 'Username Atau Password Anda Salah');
        }

        $request->session()->put('id', $data->getId());
        $request->session()->put('username', $data->getName());
        $request->session()->put('role', $data->getIsAdmin());

        if($data->getIsAdmin()){
            return redirect('/register');
        }

        return redirect('/');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/user/login')->with('success', 'Sukses Melakukan Logout');
    }
}