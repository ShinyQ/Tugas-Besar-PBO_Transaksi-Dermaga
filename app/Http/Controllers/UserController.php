<?php

namespace App\Http\Controllers;

use App\Models\Item;

class UserController extends Controller{

    public function index()
    {
         $item = new Item('Kondominium', '200', 1);
//       dd($item->get()[0]->name);
//       $container = new Container('112322', 'Besar', 'Kecil');
//       $container->save();

//       User::create([$user]);
//       return view('welcome', compact('item'));
    }

}