<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        $title = 'Halaman Transaksi User';
        $transactions = Transaction::getByUserId($request->session()->get('id'));

        return view('index', compact('title', 'transactions'));
    }
}
