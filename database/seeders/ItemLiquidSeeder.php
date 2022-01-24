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
            [
                'container_id' => 5,
                'transaction_id' => 2,
                'name' => 'Le Minerale',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 1,
                'transaction_id' => 3,
                'name' => 'Nu Tea',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 2,
                'transaction_id' => 3,
                'name' => 'Cleo',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 3,
                'transaction_id' => 3,
                'name' => 'Milo',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 4,
                'transaction_id' => 3,
                'name' => 'Pocari Sweat',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 5,
                'transaction_id' => 3,
                'name' => 'Marjan',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 1,
                'transaction_id' => 4,
                'name' => 'Mizone',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 2,
                'transaction_id' => 4,
                'name' => 'Ale-Ale',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 3,
                'transaction_id' => 4,
                'name' => 'Pepsi',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 4,
                'transaction_id' => 4,
                'name' => 'Ichi Ocha',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 5,
                'transaction_id' => 4,
                'name' => 'Sosro Tea',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 1,
                'transaction_id' => 1,
                'name' => 'Temulawak',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 2,
                'transaction_id' => 1,
                'name' => 'Buavita',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 3,
                'transaction_id' => 1,
                'name' => 'Fruit Tea',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 4,
                'transaction_id' => 1,
                'name' => 'Tebs',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 5,
                'transaction_id' => 1,
                'name' => 'Mogu Mogu',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 1,
                'transaction_id' => 2,
                'name' => 'Floridina',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 2,
                'transaction_id' => 2,
                'name' => 'Coolant',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 3,
                'transaction_id' => 2,
                'name' => 'Hemaviton',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 4,
                'transaction_id' => 2,
                'name' => 'Kratingdaeng',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ],
            [
                'container_id' => 5,
                'transaction_id' => 2,
                'name' => 'Ultra Milk',
                'weight' => '10',
                'isFlammable' => 'False',
                'volume' => '10000',
                'created_at' => Carbon::now()
            ]
        ];

        DB::table('items')->insert($data);
    }
}
