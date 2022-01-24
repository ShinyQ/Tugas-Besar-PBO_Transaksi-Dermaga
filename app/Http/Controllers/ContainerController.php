<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Models\Ship;
use Illuminate\Http\Request;

class ContainerController extends Controller
{
    public function store(Request $request)
    {
        $container = new Container([
            'ship_id' => $request->ship_id,
            'number' => $request->number,
            'type' => $request->type,
            'size' => $request->size
        ]);

        $container->save();
        return redirect('/container/'. $request->ship_id)->with('success', 'Sukses Menambahkan Container');
    }

    public function show($id)
    {
        $ship = Ship::getById($id);
        $containers = Container::getByShipId($id);
        $title = 'Detail Container Kapal';

        return view('ship_detail', compact('containers', 'ship', 'title'));
    }

    public function update(Request $request, $id)
    {
        $container = new Container([
            'ship_id' => $request->ship_id,
            'number' => $request->number,
            'type' => $request->type,
            'size' => $request->size
        ]);

        $container->save($id);
        return redirect('/container/'. $request->ship_id)->with('success', 'Sukses Mengupdate Container');
    }

    public function destroy(Request $request, $id)
    {
        Container::delete($id);
        return redirect('/container/'. $request->ship_id)->with('success', 'Sukses Menghapus Container');
    }
}
