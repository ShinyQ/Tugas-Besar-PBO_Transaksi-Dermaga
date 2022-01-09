<?php


namespace Database\Seeders;


use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => 1,
                'totalCost' => '500000',
                'totalWeight' => '100',
                'created_at' => Carbon::now()
            ],
            [
                'user_id' => 2,
                'totalCost' => '1500000',
                'totalWeight' => '80',
                'created_at' => Carbon::now()
            ]
        ];

        DB::table('transactions')->insert($data);
    }
}
