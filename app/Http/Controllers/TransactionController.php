<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Models\Item;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index(){
        Transaction::deleteUnusedTransaction();

        $title = 'Halaman Transaksi Pengguna';
        $users = User::get();
        $transactions = Transaction::get();

        return view('transaction', compact('transactions', 'users', 'title'));
    }

    public function edit($id){
        $title = 'List Transaksi Pengguna';
        $transaction = Transaction::getById($id);
        $items = Item::getById($id);
        $containers = Container::getByShipId($items->first()->container_id);

        return view('transaction_item',
            compact('transaction', 'items', 'title', 'containers')
        );
    }

    public function store(Request $request){
        $transaction = new Transaction([
            'id' => $request->id,
            'user_id' => $request->user_id,
            'totalCost' => 0,
            'totalWeight' => 0
        ]);

        $transaction->save();
        return redirect('/transaction/'. DB::getPdo()->lastInsertId() .'/edit');
    }

    public function destroy($id){
        Transaction::delete($id);
        return redirect('/transaction')->with('success', 'Sukses Menghapus Transaksi');
    }
}
