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
                'number' => '25520',
                'type' => 'Dry Storage',
                'size' => 'Small',
                'created_at' => Carbon::now()
            ],
            [
                'ship_id' => 1,
                'number' => '25521',
                'type' => 'Open Side',
                'size' => 'Small',
                'created_at' => Carbon::now()
            ],
            [
                'ship_id' => 1,
                'number' => '25522',
                'type' => 'Open Side',
                'size' => 'Large',
                'created_at' => Carbon::now()
            ],
            [
                'ship_id' => 2,
                'number' => '10005',
                'type' => 'Open Side',
                'size' => 'Small',
                'created_at' => Carbon::now()
            ],
            [
                'ship_id' => 2,
                'number' => '10006',
                'type' => 'Open Side',
                'size' => 'Small',
                'created_at' => Carbon::now()
            ],
            [
                'ship_id' => 2,
                'number' => '10007',
                'type' => 'Dry Storage',
                'size' => 'Medium',
                'created_at' => Carbon::now()
            ],
            [
                'ship_id' => 3,
                'number' => '30001',
                'type' => 'Dry Storage',
                'size' => 'Small',
                'created_at' => Carbon::now()
            ],
            [
                'ship_id' => 3,
                'number' => '30002',
                'type' => 'Dry Storage',
                'size' => 'Large',
                'created_at' => Carbon::now()
            ],
            [
                'ship_id' => 3,
                'number' => '30003',
                'type' => 'Open Side',
                'size' => 'Small',
                'created_at' => Carbon::now()
            ],
            [
                'ship_id' => 4,
                'number' => '40010',
                'type' => 'Open Side',
                'size' => 'Small',
                'created_at' => Carbon::now()
            ],
            [
                'ship_id' => 4,
                'number' => '40011',
                'type' => 'Open Side',
                'size' => 'Large',
                'created_at' => Carbon::now()
            ],
            [
                'ship_id' => 4,
                'number' => '40012',
                'type' => 'Dry Storage',
                'size' => 'Large',
                'created_at' => Carbon::now()
            ]
        ];

        DB::table('containers')->insert($data);
    }
}
