<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


class StatisticController extends Controller
{
    public function statistic(){
        $test = DB::table('users')
            ->select('users.name', DB::raw('count(users.name) as total'))
            ->join('transactions','transactions.user_id','=','users.id')
            ->join('items', 'items.transaction_id', '=', 'transactions.id')
            ->groupBy('users.name')
            ->orderBy('total', 'DESC')
            ->get();

        return view('linechart', $test);
}}
