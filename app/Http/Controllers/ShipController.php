<?php

namespace App\Http\Controllers;

use App\Models\Ship;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    public function index(){
        $ships = Ship::get();
        $title = 'Halaman List Kapal';

        return view('ship', compact('title', 'ships'));
    }

    public function store(Request $request){
        $ship = new Ship([
            'number' => $request->number,
            'name' => $request->name,
            'arrivalTime' => $request->arrivalTime
        ]);

        $ship->save();
        return redirect('/ship')->with('success', 'Sukses Menambahkan Kapal');
    }

    public function update(Request $request){
        $ship = new Ship([
            'number' => $request->number,
            'name' => $request->name,
            'arrivalTime' => $request->arrivalTime
        ]);

        $ship->save($request->id);
        return redirect('/ship')->with('success', 'Sukses Mengupdate Data Kapal');
    }

    public function destroy($id)
    {
        Ship::delete($id);
        return redirect('/ship')->with('success', 'Sukses Menghapus Data Kapal');
    }
}
