<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemLiquid;
use App\Models\ItemSolid;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function new_item(Request $request){

        if($request->isFlammable == null){
            $item = new ItemSolid([
                'transaction_id' => $request->transaction_id,
                'name' => $request->name,
                'weight' => $request->weight,
                'container' => $request->container_id],
                $request->shape,
                $request->quantity
            );
        } else {
            $item = new ItemLiquid([
                'transaction_id' => $request->transaction_id,
                'name' => $request->name,
                'weight' => $request->weight,
                'container' => $request->container_id],
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

        Transaction::updateTransactionWeight(
            'add',
            $request->transaction_id,
            $request->weight
        );

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
        Transaction::updateTransactionWeight(
            'subtract',
            DB::getPdo()->lastInsertId(),
            $request->weight
        );

        return redirect()->back()->with('success', 'Sukses Menghapus Barang');
    }
}
