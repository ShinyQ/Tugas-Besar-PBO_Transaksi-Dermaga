<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ContainerSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'ship_id' => 1,
                'number' => '12345',
                'type' => 'Dry Storage',
                'size' => 'small',
                'created_at' => Carbon::now()
            ],
            [
                'ship_id' => 1,
                'number' => '25521',
                'type' => 'Open Side',
                'size' => 'medium',
                'created_at' => Carbon::now()
            ],
            [
                'ship_id' => 1,
                'number' => '10001',
                'type' => 'Open Side',
                'size' => 'large',
                'created_at' => Carbon::now()
            ],
            [
                'ship_id' => 2,
                'number' => '10005',
                'type' => 'Open Side',
                'size' => 'medium',
                'created_at' => Carbon::now()
            ],
            [
                'ship_id' => 2,
                'number' => '10002',
                'type' => 'Open Side',
                'size' => 'medium',
                'created_at' => Carbon::now()
            ],
            [
                'ship_id' => 2,
                'number' => '10003',
                'type' => 'Open Side',
                'size' => 'medium',
                'created_at' => Carbon::now()
            ]
        ];

        DB::table('containers')->insert($data);
    }
}
