<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ItemLiquidSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'container_id' => 1,
                'transaction_id' => 1,
                'name' => 'cola',
                'weight' => '10',
                'isFlammable' => 0,
                'volume' => '5000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 2,
                'transaction_id' => 2,
                'name' => 'sprite',
                'weight' => '10',
                'isFlammable' => 0,
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 3,
                'transaction_id' => 1,
                'name' => 'aqua',
                'weight' => '10',
                'isFlammable' => 0,
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 4,
                'transaction_id' => 2,
                'name' => 'pertalite',
                'weight' => '10',
                'isFlammable' => 0,
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 1,
                'transaction_id' => 1,
                'name' => 'Pertamax',
                'weight' => '10',
                'isFlammable' => 1,
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 2,
                'transaction_id' => 2,
                'name' => 'Pertamax Turbo',
                'weight' => '10',
                'isFlammable' => 1,
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 3,
                'transaction_id' => 1,
                'name' => 'Shell V',
                'weight' => '10',
                'isFlammable' => 1,
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 4,
                'transaction_id' => 2,
                'name' => 'Minute Maid',
                'weight' => '10',
                'isFlammable' => 0,
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 1,
                'transaction_id' => 1,
                'name' => 'Fresh Tea',
                'weight' => '10',
                'isFlammable' => 0,
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
        ];

        DB::table('items')->insert($data);
    }
}
