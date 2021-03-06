<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        $users = User::get();
        $title = 'Halaman Registrasi User';

        return view('register', compact('title', 'users'));
    }

    public function store(Request $request){
        $user = new User([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'address' => $request->address,
            'phone' => $request->phone,
            'is_admin' => 0
        ]);

        $user->save();
        return redirect('/register')->with('success', 'Sukses Menambahkan Pengguna');
    }

    public function update(Request $request){
        $user = new User([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'address' => $request->address,
            'phone' => $request->phone,
            'is_admin' => 0
        ]);

        $user->save($request->id);
        return redirect('/register')->with('success', 'Sukses Mengupdate Data Pengguna');
    }
}
