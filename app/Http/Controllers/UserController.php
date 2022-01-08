<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller{

    public function login_view(){
        return view('login');
    }

    public  function login(Request $request){
        $response = User::login($request->username, $request->password);

        if(empty($response)){
            return redirect()->back()->with('error', 'Username Atau Password Anda Salah');
        }

        $request->session()->put('id',$response[0]->id);
        $request->session()->put('username', $response[0]->name);
        $request->session()->put('role', $response[0]->is_admin);

        return redirect('/');
    }

    public function logout(){
        Session::flush();
        return redirect('/user/login')->with('success', 'Sukses Melakukan Logout');
    }
}