<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemLiquid;
use App\Models\ItemSolid;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function new_item(Request $request){
        if(!$request->has('isFlammable')){
            $item = new ItemSolid(
                $request->id,
                $request->transaction_id,
                $request->name,
                $request->weight,
                $request->container_id,
                $request->shape,
                $request->quantity
            );
        } else {
            $item = new ItemLiquid(
                $request->id,
                $request->transaction_id,
                $request->name,
                $request->weight,
                $request->container_id,
                (bool) $request->isFlammable,
                $request->volume
            );
        }

        return $item;
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $item = $this->new_item($request);
        $item->save();

        return redirect()->back()->with('success', 'Sukses Menambahkan Barang');
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $item = $this->new_item($request);
        $item->save($id);

        return redirect()->back()->with('success', 'Sukses Mengupdate Barang');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        Item::delete($id);
        return redirect()->back()->with('success', 'Sukses Menghapus Barang');
    }
}
