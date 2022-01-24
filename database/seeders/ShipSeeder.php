<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ShipSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'number' => '155255',
                'name' => 'GRACE V',
                'arrivalTime' => '2021-01-31 00:00:00',
                'created_at' => Carbon::now()
            ],
            [
                'number' => '212455',
                'name' => 'SOECHI PRESTASI',
                'arrivalTime' => '2021-01-10 00:00:00',
                'created_at' => Carbon::now()
            ],
            [
                'number' => '155257',
                'name' => 'MAERSK',
                'arrivalTime' => '2022-01-12 00:00:00',
                'created_at' => Carbon::now()
            ],
            [
                'number' => '155258',
                'name' => 'MSC',
                'arrivalTime' => '2022-01-14 00:00:00',
                'created_at' => Carbon::now()
            ]
        ];

        DB::table('ships')->insert($data);
    }
}
