<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Models\Ship;
use Illuminate\Http\Request;

class ContainerController extends Controller
{
    public function store(Request $request)
    {
        $container = new Container(
            $request->ship_id,
            $request->number,
            $request->type,
            $request->size
        );

        $container->save();
        return redirect('/container/'. $request->ship_id);
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
        $container = new Container(
            $request->ship_id,
            $request->number,
            $request->type,
            $request->size
        );

        $container->save($id);
        return redirect('/container/'. $id);
    }

    public function destroy(Request $request, $id)
    {
        Container::delete($id);
        return redirect('/container/'. $id);
    }
}
