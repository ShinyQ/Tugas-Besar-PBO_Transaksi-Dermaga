<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Models\Item;
use App\Models\Ship;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index(){
        Transaction::deleteUnusedTransaction();

        $title = 'Halaman Transaksi Pengguna';
        $transactions = Transaction::get();
        $users = User::get();
        $ships = Ship::get();

        return view('transaction', compact('transactions', 'users', 'title', 'ships'));
    }

    public function getUserTransaction($id)
    {
        $title = "Data Transaksi";
        $transactions = Transaction::getByUserId($id);

        return view('user_transaction', compact('transactions', 'title'));
    }

    public function getUserTransactionItem($id)
    {
        $transaction_id = $id;
        $title = "Detail Item Transaksi";
        $items = Item::getById($id);

        return view('user_transaction_item', compact('title', 'items', 'transaction_id'));
    }

    public function edit($id){
        $title = 'List Transaksi Pengguna';
        $transaction = Transaction::getById($id);
        $items = Item::getById($id);
        $containers = Container::getByShipId($transaction->getShipId());
        $transaction_id = $id;

        return view('transaction_item',
            compact('transaction', 'items', 'title', 'containers', 'transaction_id')
        );
    }

    public function store(Request $request){
        $transaction = new Transaction([
            'id' => $request->id,
            'user_id' => $request->user_id,
            'ship_id' => $request->ship_id,
            'arrivalTime' => $request->arrivalTime,
            'totalCost' => $request->totalCost,
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
