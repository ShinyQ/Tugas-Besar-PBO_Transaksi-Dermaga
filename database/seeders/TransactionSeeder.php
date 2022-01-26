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
                'ship_id' => 1,
                'arrivalTime' => new Carbon('2022-01-25 11:53:20'),
                'totalWeight' => '100',
                'created_at' => Carbon::now()
            ],
            [
                'user_id' => 2,
                'ship_id' => 1,
                'totalCost' => '1500000',
                'arrivalTime' => new Carbon('2022-01-25 11:53:20'),
                'totalWeight' => '80',
                'created_at' => Carbon::now()
            ],
            [
                'user_id' => 3,
                'ship_id' => 1,
                'totalCost' => '2000000',
                'arrivalTime' => new Carbon('2022-01-25 11:53:20'),
                'totalWeight' => '235',
                'created_at' => Carbon::now()
            ],
            [
                'user_id' => 4,
                'ship_id' => 2,
                'totalCost' => '3000000',
                'arrivalTime' => new Carbon('2022-01-26 12:53:20'),
                'totalWeight' => '340',
                'created_at' => Carbon::now()
            ]
        ];

        DB::table('transactions')->insert($data);
    }
}
