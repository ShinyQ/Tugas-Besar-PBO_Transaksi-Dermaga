<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Container;
use App\Models\ItemLiquid;
use App\Models\ItemSolid;
use App\Models\Ship;
use phpDocumentor\Reflection\Types\Null_;

class UserController extends Controller{

    public function index()
    {
        $ship = new Ship("123145", 'Moby Dick', "2021/03/02");
        $ship->save();
        $container = new Container(1,'112322', 'Besar', 'Kecil');
        $container->save();
//        $itemLiquid = new ItemLiquid('Kondominium', '200', 1, "True", "200");
//        $itemLiquid->save();
        $itemSolid = new ItemSolid('itemsolid', '200', 1, "cube", "2");
        $itemSolid->save();
        dd($itemSolid->get());

       return view('welcome', compact('item'));
    }

}
